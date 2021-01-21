<?php

namespace App\Http\Controllers;

use App\Models\AssignProduct;
use App\Models\ClientSetting;
use App\Models\ProductInfo;
use App\Models\ProductReturn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductInfo::all();
        $companies=ClientSetting::all();
        $allocatedproducts=AssignProduct::all();
        return view('product_allocation',compact('products','companies','allocatedproducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function stock(Request $request)
    {
        $id = $request->id;
        $get_data = ProductInfo::where('id',$id)->first();
        
        $data = array(
            'quantity'=>$get_data->stock
        );
        return json_encode($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'company_id' => 'required',
            'quantity' => 'required',
            'date' => 'required',
        ]);        
        $validatedData['user_id']=auth()->user()->id;
        AssignProduct::create($validatedData);
        $product=ProductInfo::where('id',$validatedData['product_id'])->first();
        $stock=$product->stock;
        $product->stock=$stock-$validatedData['quantity'];
        $product->save();
        return redirect('/admin/product/allotments')->with('flash_message_success', 'Product Allocated Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function return()
    {
        $allotments=AssignProduct::all();
        return view('retun_product',compact('allotments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $get_data = AssignProduct::where('id',$id)->first();
        $get_stock=ProductInfo::where('id',$get_data->product_id)->first();
        $data = array(
            'id'=>$get_data->id,
            'company_id' => $get_data->company_id, 
            'product_id' => $get_data->product_id,
            'company_name' => $get_data->company->company_name, 
            'product_name' => $get_data->product->name, 
            'quantity' => $get_data->quantity,
            'date' => $get_data->date,
            'stock'=>$get_stock->stock
        );
        return json_encode($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        //dd($id);
        $company_id = $request->edit_company_id;
        $product_id = $request->edit_product_id;
        $edit_date = $request->edit_date;
        $edit_quantity = $request->edit_quantity;
        $stock_rem=$request->stock_rem;
       // DB::table('assign_companys')->where(['id'=>$id])->update(['product_id'=>$product_id,'company_id'=>$company_id,'quantity'=>$edit_quantity,'date'=>$edit_date]);
       $product = AssignProduct::where('id',$id)->first();
       $product->product_id=$product_id;
       $product->company_id=$company_id;
       $product->date=$edit_date;
       $product->quantity=$edit_quantity;
       $product->save();
       $pro=ProductInfo::where('id',$product_id)->first();
       $pro->stock=$stock_rem;
       $pro->save();
        echo 'Allocated Product Data Updated Successfully!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assign = AssignProduct::where('id', $id)->first();
        $product_id=$assign->product_id;
        $qty=$assign->quantity;
        $product=ProductInfo::where('id',$product_id)->first();
        $stock=$product->stock;
        $product->stock=$stock+$qty;
        $product->save();
        $delete = AssignProduct::where('id', $id)->delete();
        if ($delete == 1) {
            $success = true;
            $message = "Allocated Product deleted successfully!";
        } else {
            $success = true;
            $message = "Allocated Product data not found";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
    public function return_to_stock($id){
        $assign = AssignProduct::where('id', $id)->first();
        $product_id=$assign->product_id;
        $qty=$assign->quantity;
        $product=ProductInfo::where('id',$product_id)->first();
        $stock=$product->stock;
        $product->stock=$stock+$qty;
        $product->save();
        $delete = AssignProduct::where('id', $id)->delete();
        if ($delete == 1) {
            $success = true;
            $message = "Product Returned successfully!";
        } else {
            $success = true;
            $message = "Product data not found";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
