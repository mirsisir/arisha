<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\AssignEmployee;
use App\Models\ClientSetting;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeAllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = AssignEmployee::all();
        $search=Employee::whereNotIn('id',AssignEmployee::select('employee_id')->get())->get();
        $searchCompany=ClientSetting::all();
        return view('employee',compact('employees','search','searchCompany'));
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
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'company_id' => 'required',
            'employee_id' => 'required',
            'type' => 'required',
            'date' => 'required',
        ]);        

        
        $validatedData['user_id']=auth()->user()->id;
        AssignEmployee::create($validatedData);
        $search=Employee::whereNotIn('id',AssignEmployee::select('employee_id')->get())->get();
        $employees = AssignEmployee::all();
        $searchCompany=ClientSetting::all();
        return view('employee',compact('employees','search','searchCompany'))->with('flash_message_success', 'Employee Allocated Successfully!');
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
        $get_data = AssignEmployee::where('id',$id)->first();
        
        $data = array(
            'id'=>$get_data->id,
            'employee_id' => $get_data->employee_id, 
            'company_id' => $get_data->company_id,
            'employee_name' => $get_data->employee->name, 
            'company_name' => $get_data->company->company_name, 
            'type' => $get_data->type,
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
        $employee_name = $request->edit_employee_name;
        $company_name = $request->edit_company_name;
        $edit_date = $request->edit_date;
        $edit_type = $request->edit_type;
       // DB::table('assign_employees')->where(['id'=>$id])->update(['company_id'=>$company_name,'employee_id'=>$employee_name,'type'=>$edit_type,'date'=>$edit_date]);
       $employee = AssignEmployee::where('id',$id)->first();
       $employee->company_id=$company_name;
       $employee->employee_id=$employee_name;
       $employee->date=$edit_date;
       $employee->type=$edit_type;
       $employee->save();
        echo 'Allocated Employee Data Updated Successfully!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = AssignEmployee::where('id', $id)->delete();
        if ($delete == 1) {
            $success = true;
            $message = "Assigned Employee deleted successfully!";
        } else {
            $success = true;
            $message = "Assigned data not found";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
