<?php

namespace App\Http\Controllers;

use App\Models\ProductInfo;
use App\Models\PurchaseDetail;
use App\Models\PurchasePrimary;
use App\Models\PurchaseReturn;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers=Supplier::all();
        $products=ProductInfo::all();
        return view('purchase',compact('suppliers','products'));
    }
    public function return()
    {
        $suppliers=Supplier::all();
        return view('purchase_return',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_purchase_products(Request $req){
         
        $fieldValues = json_decode($req['fieldValues'], true);
        
        //$supplier_name = $fieldValues['supplier_name'];
        $supplier_id = $fieldValues['supplier_name'];
        $supplier_memo = $fieldValues['supplier_memo'];
        $discount = $fieldValues['discount'];
        $amount = $fieldValues['amount'];
        $payment = $fieldValues['payment'];
        $total = $fieldValues['total'];
        $date = $fieldValues['date'];
        $user = Auth::id();
        
        if($discount == ''){$discount = "0.00";}
        if($payment == ''){$payment = "0.00";}
        
        
        $maxid = (DB::table('purchase_primaries')->max('id') + 1);

        $primary_id = $maxid;
        
        DB::table('purchase_primaries')->insert([
            'id' => $primary_id,
            'supplier_id' => $supplier_id,
            'supplier_memo' => $supplier_memo,
            'discount' => $discount,
            'amount' => $amount,
            'total' => $total,
            'payment' => $payment,
            'date' => $date,
            'user_id' => $user
        ]);
        
        
        $take_cart_items = json_decode($req['cartData'], true);
        
        $count = count($take_cart_items);
        
        for($i = 0; $i < $count;){
            
            $j = $i;
            $j1 = $i+1;
            $j2 = $i+2;
            $j3 = $i+3;
            $j4 = $i+4;
            
            
            
           
            $product = DB::table('product_infos')->where('id', $take_cart_items[$j])->first(); 
            $stock = $product->stock;
            $stock = ($stock + $take_cart_items[$j3]);
                
            DB::table('product_infos')->where('id', $take_cart_items[$j])->update(['stock' => $stock]);
                
            $pid = $take_cart_items[$j]; 
            
            
            DB::table('purchase_details')->insert([
                'primary_id' => $primary_id,
                'product_id' => $pid,
                'quantity' => $take_cart_items[$j3],
                'price' => $take_cart_items[$j2],
                'total' => $take_cart_items[$j4],
                'user_id' => $user
            ]);
           
            
            $i = $i + 5;
        } 
        
        return response()->json(['status'=>'success']);
        
    }
    public function purchase_report_date(){
        
        return view("purchase_report_date");
    }

    public function get_purchase_report_date(Request $req){
        
        $stdate = $req['stdate'];
        
        $enddate = $req['enddate'];
        
        $purchase = DB::table('purchase_primaries')->join('suppliers', 'purchase_primaries.supplier_id', 'suppliers.id')->whereBetween('date', [$stdate, $enddate])->get();
        
        $trow = "";
        
        foreach($purchase as $pur){
            $trow .= "<tr><td>".$pur->date."</td><td class='purinv'>".$pur->supplier_memo."</td><td>".$pur->name."</td><td class='supp_invoice'>".$pur->supplier_memo."</td><td>".$pur->discount."</td>
            <td>".$pur->amount."</td><td>".$pur->payment."</td><td>".$pur->total."</td>
            <td><a title='Delete' href='#' class='delete'><span class='btn btn-xs btn-danger'><i class='mdi mdi-delete'></i></span></a></td>
            </tr>";
        }
        
        return $trow;
    }

    public function delete_purchase(Request $req){
        
        $purinv = $req['purinv'];
        $get_pur_details = DB::table('purchase_details')->where('primary_id', $purinv)->get();
        DB::table('purchase_primaries')->where('supplier_memo', $purinv)->delete();
        foreach($get_pur_details as $row){
            
            $pid = $row->product_id; 
            $qnt = $row->quantity;	
            $get_products = DB::table('product_infos')->where('id', $pid)->first();
            
            $stock = $get_products->stock;
            
            $stock = ($stock - $qnt);
            DB::table('product_infos')->where('id', $pid)->update(['stock' => $stock]);
        }
        
        DB::table('purchase_details')->where('primary_id', $purinv)->delete();
    }


    public function get_purchase_invoice_details(Request $req){
        
        $s_text = $req['s_text'];
        
        $get_invoice = DB::table('purchase_details')->join('product_infos', 'purchase_details.product_id', 'product_infos.id')->where('purchase_details.primary_id', '=', $s_text)->get(); 
        
        $trow = "";
        
        foreach($get_invoice as $row){
            
            $trow .= "<tr><td>".$row->name."</td><td>".$row->price."</td><td>".$row->quantity."</td><td>".$row->total."</td></tr>";
            
        }
        
        $get_invoice = DB::table('purchase_primaries')->where('supplier_memo', '=', $s_text)->first(); 
        
        if($get_invoice->supplier_id > 0){
            
            $get_cname = DB::table('suppliers')->where('id', '=', $get_invoice->supplier_id)->first();
            
            $supp_name = $get_cname->name;
            $supp_phone = $get_cname->phone;
            
        }else{
            
            $supp_name = "";
            $supp_phone = "";
        }
        
        $discount = $get_invoice->discount;
        $amount = $get_invoice->amount;
        $total = $get_invoice->total;
        $payment = $get_invoice->payment;
        $date = $get_invoice->date;
        
        $data = array(
            
            "invoice" => $s_text, 
            "trow" => $trow, 
            "discount" => $discount,
            "amount" => $amount,
            "total" => $total,
            "payment" => $payment,
            "date" => $date,
            "supp_name" => $supp_name,
            "supp_phone" => $supp_phone,
        );
        
        return json_encode($data);
    }
    public function save_return_products(Request $req){

        $fieldValues = json_decode($req['fieldValues'], true);
        $date = $fieldValues['date'];
        $take_cart_items = json_decode($req['cartData'], true);
        
        $count = count($take_cart_items);
        
        for($i = 0; $i < $count;){
            
            $j = $i;
            $j1 = $i+1;
            $j2 = $i+2;
            $j3 = $i+3;
            $j4 = $i+4;
            //$primary=PurchasePrimary::where('supplier_memo',$take_cart_items[$j1])->first();
            //$primary_id=$primary->id;
           // $product = DB::table('purchase_details')->where('primary_id', $primary_id)->where('product_id', $take_cart_items[$j2])->first(); 
            //$stock = $product->quantity;
            //$quantity = ($stock - $take_cart_items[$j3]);
                
            //DB::table('purchase_details')->where('primary_id', $primary_id)->where('product_id', $take_cart_items[$j2])->update(['quantity' => $quantity]);
              
            $product = DB::table('product_infos')->where('id', $take_cart_items[$j2])->first();
            $stock = $product->stock;
            $stock = ($stock - $take_cart_items[$j3]);
            DB::table('product_infos')->where('id', $take_cart_items[$j2])->update(['stock' => $stock]);
            
            DB::table('purchase_returns')->insert([
                'supplier_id' => $take_cart_items[$j],
                'supplier_memo' => $take_cart_items[$j1],
                'product_id' => $take_cart_items[$j2],
                'quantity' => $take_cart_items[$j3],
                'total' => $take_cart_items[$j4],
                'date' => $date,
                'user_id' => Auth::id()
            ]);
            $i = $i + 5;
        } 
        return response()->json(['status'=>'success']);
    }
   
    public function purchase_return_report_date(){
        
        return view("purchase_return_report_date");
    }

    public function get_purchase_return_report_date(Request $req){
        
        $stdate = $req['stdate'];
        
        $enddate = $req['enddate'];
        
        $purchase = PurchaseReturn::whereBetween('date', [$stdate, $enddate])->get();
        
        $trow = "";
        
        foreach($purchase as $pur){
            $trow .= "<tr><td>".$pur->date."</td><td data-supp_id='".$pur->supplier_id."'>".$pur->supplier->name."</td><td data-supp_memo='".$pur->supplier_memo."'>".$pur->supplier_memo."</td><td data-pro_id='".$pur->product->id."'>".$pur->product->name."</td><td>".$pur->quantity."</td><td>".$pur->total."</td>
            <td><a title='Delete' href='#' class='delete'><span class='btn btn-xs btn-danger'><i class='mdi mdi-delete'></i></span></a></td>
            </tr>";
        }
        
        return $trow;
    }

    public function delete_purchase_return(Request $req){
        
       $s_id=$req['s_id'];
       $s_memo=$req['s_memo'];
       $p_id=$req['p_id'];
        $return=PurchaseReturn::where('supplier_memo',$s_memo)->where('product_id',$p_id)->first();
        $qty=$return->quantity;
        $return->delete();
        $product = DB::table('product_infos')->where('id', $p_id)->first();
        $stock = $product->stock;
        $stock = ($stock + $qty);
        DB::table('product_infos')->where('id', $p_id)->update(['stock' => $stock]);
        
    }


    public function get_purchase_return_details(Request $req){
        
        $s_id = $req['s_id'];
        $s_memo = $req['s_memo'];
        $p_id = $req['p_id'];
        
        //$get_invoice = DB::table('purchase_returns')->join('product_infos', 'purchase_details.product_id', 'product_infos.id')->where('purchase_details.primary_id', '=', $s_text)->get(); 
        $details=PurchaseReturn::where('supplier_memo',$s_memo)->where('product_id',$p_id)->first();
        $trow = "";
        

            
        $trow .= "<tr><td>".$details->product->name."</td><td>".$details->quantity."</td><td>".$details->total."</td></tr>";
            
    
                
        $data = array(
            "trow" => $trow, 
            "date" => $details->date,
            "supp_name" => $details->supplier->name,
            "supp_memo" => $details->supplier_memo,
            "supp_phone" => $details->supplier->phone,
        );
        
        return json_encode($data);
    }
    
    public function get_suppmemo(Request $req){
        
        $s_text = $req['s_text'];
        $suppmemo = DB::table('purchase_primaries')->where('supplier_memo', 'like', '%'.$s_text.'%')->limit(9)->get(); ?>
        
        <ul class='suppmemo-list sugg-list'>
        
        <?php $i = 1;
        
        foreach($suppmemo as $row){
            
            $supp_inv = $row->supplier_memo;
            
            $i = $i + 1; ?>
            
            <li tabindex='<?php echo $i; ?>' onclick='selectPurmemo("<?php echo $supp_inv; ?>");' data-suppmemo='<?php echo $supp_inv; ?>'> <?php echo $supp_inv; ?></li>
            
        <?php } ?>
        
        </ul>
        
        <?php 
    }
    public function get_sup_memo(Request $req){
        
        $id = $req['id'];
        $com = PurchasePrimary::where('supplier_id',$id)->get();
        $data = array();
        $dd=array();
        foreach($com as $d){
            $dd['supplier_memo']=$d->supplier_memo;
            array_push($data, $dd);
        }
        return json_encode($data);
    }
    public function get_sup_product(Request $req){
        
        $id = $req['id'];
        $primary=PurchasePrimary::where('supplier_memo',$id)->first();
        $primary_id=$primary->id;
        $com = PurchaseDetail::where('primary_id',$primary_id)->get();
        $data = array();
        $dd=array();
        foreach($com as $d){
            $dd['product_id']=$d->product_id;
            $dd['product_name']=$d->product->name;
            array_push($data, $dd);
        }
        return json_encode($data);
    }
    public function get_sup_product_price(Request $req){
        
        $id = $req['id'];
        $com = PurchaseDetail::where('product_id',$id)->get();
        $data = array();
        $dd=array();
        foreach($com as $d){
            $dd['price']=$d->price;
            array_push($data, $dd);
        }
        return json_encode($data);
    }
}
