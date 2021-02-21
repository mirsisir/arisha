<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\SalaryInfo;
use App\Models\SalarySheet;
use App\Models\ServiceRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function partner_request(){
        view::share('title','Partner Request');

        $all_employee = Employee::where('active_employee',0)->get();


        return view('employees.partner_request',compact('all_employee'));
    }


    public function partner_request_accept($id){
            $employee = Employee::find($id);
            $employee->active_employee = 1;
            $employee->save();

        $password = Str::random(10);

         User::create([
            'name' => $employee->fname . " ". $employee->lname,
            'phone' => $employee->mobile,
            'employee_id' => $employee->id,
            'email' => $employee->email,
            'password' => Hash::make($password),
            'role' => "employee",
        ]);


        return redirect('admin/partner_request');
    }



    public function services_request_list(){
        view::share('title','Service Request');

        $all_service_request = ServiceRequest::where('status','confirm')
                                            ->where('employes_id',null)->get();

        return view('employee_dashboard.service_request',compact('all_service_request'));
    }


    public function accept_service_request($id){

        $service = ServiceRequest::find($id);
        if($service->employes_id ==null){
        $service->employes_id = auth()->user()->id;
        $service->save();
        }
         return redirect( route('services_request_list'));
    }

    public function today_service_list(){

        $all_service_request = ServiceRequest::where('status','confirm')
                               ->where('employes_id', auth()->user()->id)
                                ->where('date', Carbon::today()->toDateString())
                                ->get();

        return view('employee_dashboard.today_service_list',compact('all_service_request'));
    }


    public function service_details($id)
    {

        $service_request = ServiceRequest::find($id);

        return view('employee_dashboard.service_details', compact('service_request'));
    }

    public function employee_calender()
    {
        $service_request = \App\Models\ServiceRequest::where('employes_id',auth()->user()->id)->get();


        return view('employee_dashboard.employee_calender', compact('service_request'));
    }



    public function employee_bill($id){

        $service_request = ServiceRequest::find($id);

//        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ServiceRequest($data,$this->customer));

        $service_request->paid = 1;
        $service_request->save();

        return view('employees.employee_bill',compact('service_request'));
    }


    protected function employee_bill_total()
    {
        $service_request = ServiceRequest::where('employes_id',auth()->user()->id)
                                            ->where('paid',0)->get();

        return view('employees.employee_bill_total',compact('service_request'));
    }




//    public function make_payments($id){
//
//        $employee = Employee::find($id);
//        View::share('title','Make Payments ');
//
//        return view('livewire.salary.make_payments',compact('employee'));
//    }

//    public function pay( $e_id , $month){
//         $payslip= SalarySheet::where('employee_id',$e_id)
//                                ->where('date' ,$month )
//                                        ->first();
//
//
//        return view('payslip', compact('payslip'));
//
//    }
//
//    public function payslip(){
//
//        $employee = SalarySheet::all();
//
//        return view('payslip_generate', compact('employee'));
//    }
//    public function payslip_redirect(Request $request){
//        $validated = $request->validate([
//            'employee' => 'required',
//            'month' => 'required',
//        ]);
//
//
//        return redirect('payslip/'.(\request('employee')).('/').(\request('month')));
//
//    }
//
//    public function print_user($employee){
//        $emp = Employee::findOrFail($employee);
//        $emp_sal= SalaryInfo::firstWhere('employee_id',$employee);
//
//        return view('employees.profile',compact('emp' ,'emp_sal'));
//    }




}
