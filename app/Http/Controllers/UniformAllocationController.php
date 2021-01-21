<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\UniformAllotment;
use App\Models\UniformSettings;
use Illuminate\Http\Request;

class UniformAllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uniforms = UniformAllotment::all();
        $employees=Employee::all();
        $products=UniformSettings::all();
        return view('uniform_allocation',compact('uniforms','employees','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function collection()
    {
        //
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
            'employee_id' => 'required',
            'quantity' => 'required',
            'date' => 'required',
        ]);        
        $validatedData['user_id']=auth()->user()->id;
        UniformAllotment::create($validatedData);
        return redirect('/admin/uniform/allotments')->with('flash_message_success', 'Uniform Allocated Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $get_data = UniformAllotment::where('id',$id)->first();
        
        $data = array(
            'id'=>$get_data->id,
            'employee_id' => $get_data->employee_id, 
            'product_id' => $get_data->product_id,
            'employee_name' => $get_data->employee->name, 
            'product_name' => $get_data->product->product_name, 
            'quantity' => $get_data->quantity,
            'date' => $get_data->date
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
        $employee_id = $request->edit_employee_id;
        $product_id = $request->edit_product_id;
        $edit_date = $request->edit_date;
        $edit_quantity = $request->edit_quantity;
       // DB::table('assign_employees')->where(['id'=>$id])->update(['product_id'=>$product_id,'employee_id'=>$employee_id,'quantity'=>$edit_quantity,'date'=>$edit_date]);
       $uniform = UniformAllotment::where('id',$id)->first();
       $uniform->product_id=$product_id;
       $uniform->employee_id=$employee_id;
       $uniform->date=$edit_date;
       $uniform->quantity=$edit_quantity;
       $uniform->save();
        echo 'Allocated Uniform Data Updated Successfully!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = UniformAllotment::where('id', $id)->delete();
        if ($delete == 1) {
            $success = true;
            $message = "Allocated Uniform deleted successfully!";
        } else {
            $success = true;
            $message = "Allocated Uniform data not found";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
