<?php

namespace App\Http\Controllers;

use App\Models\ProductInfo;
use App\Models\UniformDestroy;
use App\Models\UniformSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UniformDestroyController extends Controller
{
    public function index()
    {
        $products=UniformSettings::all();
        return view('uniform_destroy',compact('products'));
    }
    public function save_destroy_products(Request $req){
        $fieldValues = json_decode($req['fieldValues'], true);
        $date = $fieldValues['date'];
        $take_cart_items = json_decode($req['cartData'], true);
        
        $count = count($take_cart_items);
        
        for($i = 0; $i < $count;){
            
            $j = $i;
            $j1 = $i+1;
            $product = DB::table('uniform_settings')->where('id', $take_cart_items[$j])->first(); 
            $stock = $product->stock;
            $stock = ($stock - $take_cart_items[$j1]);
                
            DB::table('uniform_settings')->where('id', $take_cart_items[$j])->update(['stock' => $stock]);
            DB::table('uniform_destroys')->insert([
                'product_id' => $take_cart_items[$j],
                'quantity' => $take_cart_items[$j1],
                'date' => $date,
                'user_id' => Auth::id()
            ]);
            $i = $i + 2;
        } 
        return response()->json(['status'=>'success']);

    }
    public function destroy_report_date(){
        
        return view("uniform_destroy_report_date");
    }

    public function get_destroy_report_date(Request $req){
        
        $stdate = $req['stdate'];
        
        $enddate = $req['enddate'];
        
        $purchase = UniformDestroy::whereBetween('date', [$stdate, $enddate])->get();
        $trow = "";
        
        foreach($purchase as $pur){
            $trow .= "<tr><td  data-des_id='".$pur->id."'>".$pur->date."</td><td data-pro_id='".$pur->product_id."'>".$pur->product->product_name."</td><td>".$pur->quantity."</td>
            <td><a title='Delete' href='#' class='delete'><span class='btn btn-xs btn-danger'><i class='mdi mdi-delete'></i></span></a></td>
            </tr>";
        }
        
        return $trow;
    }
    public function get_destroy_report_details(Request $req){
        
        $s_text = $req['des_id'];
        
        $returns = UniformDestroy::where('id', '=', $s_text)->first(); 
        $trow = "";
        
            
            $trow .= "<tr><td>".$returns->product->product_name."</td><td>".$returns->quantity."</td></tr>";
            
        
        $data = array(
            
            "date" => $returns->date, 
            "trow" => $trow,
        );
        
        return json_encode($data);
    }
    public function delete_destroy(Request $req){
        
         $des_id=$req['des_id'];
         $p_id=$req['p_id'];
         $return=UniformDestroy::where('id',$des_id)->where('product_id',$p_id)->first();
         $qty=$return->quantity;
         $return->delete();
         $product = DB::table('uniform_settings')->where('id', $p_id)->first();
         $stock = $product->stock;
         $stock = ($stock + $qty);
         DB::table('uniform_settings')->where('id', $p_id)->update(['stock' => $stock]);
         return response()->json(['status'=>'success']);

     }
}