<?php

namespace App\Http\Controllers;

use App\Models\AssignProduct;
use App\Models\ProductReturn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductReturnController extends Controller
{
    public function index()
    {
        $companies=AssignProduct::all();
        return view('return_product',compact('companies'));
    }
    public function return_to_stock(){

    }
    public function get_product(Request $req){
        
        $id = $req['id'];
        $com = AssignProduct::where('company_id',$id)->get();
        $data = array();
        $dd=array();
        foreach($com as $d){
            $dd['product_id']=$d->product_id;
            $dd['product_name']=$d->product->name;
            array_push($data, $dd);
        }
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
            $product = DB::table('product_infos')->where('id', $take_cart_items[$j1])->first(); 
            $stock = $product->stock;
            $stock = ($stock + $take_cart_items[$j2]);
                
            DB::table('product_infos')->where('id', $take_cart_items[$j1])->update(['stock' => $stock]);
              
            $product = DB::table('assign_products')->where('company_id', $take_cart_items[$j])->where('product_id', $take_cart_items[$j1])->first();
            $stock = $product->quantity;
            $stock = ($stock - $take_cart_items[$j2]);
            $product = DB::table('assign_products')->where('company_id', $take_cart_items[$j])->where('product_id', $take_cart_items[$j1])->update(['quantity' => $stock]);
            
            DB::table('product_returns')->insert([
                'company_id' => $take_cart_items[$j],
                'product_id' => $take_cart_items[$j1],
                'quantity' => $take_cart_items[$j2],
                'date' => $date,
                'user_id' => Auth::id()
            ]);
            $i = $i + 3;
        } 
        
    }
    public function return_report_date(){
        
        return view("product_return_report_date");
    }

    public function get_return_report_date(Request $req){
        
        $stdate = $req['stdate'];
        
        $enddate = $req['enddate'];
        
        $purchase = DB::table('product_returns')->select('date')->distinct()->whereBetween('date', [$stdate, $enddate])->get();
        
        $trow = "";
        
        foreach($purchase as $pur){
            $date=$pur->date;
            $c=0;
            $qty=DB::table('product_returns')->select('quantity')->where('date', $date)->get();
            foreach($qty as $q){
                $c=$c+$q->quantity;
            }
            $trow .= "<tr><td  class='purinv'>".$pur->date."</td><td>".$c."</td><tr>";
        }
        
        return $trow;
    }
    public function get_return_report_details(Request $req){
        
        $s_text = $req['s_text'];
        
        $returns = ProductReturn::where('date', '=', $s_text)->get(); 
        $trow = "";
        
        foreach($returns as $row){
            
            $trow .= "<tr><td>".$row->company->company_name."</td><td>".$row->product->name."</td><td>".$row->quantity."</td></tr>";
            
        }
        
        $data = array(
            
            "date" => $s_text, 
            "trow" => $trow,
        );
        
        return json_encode($data);
    }
}
