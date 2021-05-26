<?php

namespace App\Http\Controllers;

use App\Jobs\PayslipJob;
use App\Mail\PartnerRequestAcceptMail;
use App\Mail\ServiceDoneVoucherMail;
use App\Models\Employee;
use App\Models\SalaryInfo;
use App\Models\SalarySheet;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\StripeCard;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Stripe\Charge;
use Session;
use Exception;

use PDF;

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

//        $employee->active_employee = 1;
            $employee->save();

        $password = Str::random(10);

         $Emp = User::create([
            'name' => $employee->fname . " ". $employee->lname,
            'phone' => $employee->mobile,
            'employee_id' => $employee->id,
            'email' => $employee->email,

            'house_number' => $employee->address,
            'street' => $employee->street,
            'city' => $employee->city,
            'post_code' => $employee->post_code,


            'password' => Hash::make($password),
            'role' => "employee",
        ]);


        if(!empty($employee->service)){

            foreach ($employee->service as $servoce){
                $service = Service::find($servoce);
                $d = $service->employee;
                    array_push($d,$Emp->id);
                $service->employee = $d;
                $service->save();
            }
        }

        Mail::to($Emp->email)->send(new PartnerRequestAcceptMail($Emp,$password));

        return redirect('admin/partner_request');

    }



    public function services_request_list(){
        view::share('title','Service Request');
//
//        $all_service_request = ServiceRequest::where('status','confirm')
//                                            ->where('employes_id',null)->get();

//        $all_service_request = ServiceRequest::where('status','confirm')->whereIn('service_id',auth()->user()->employee->service)
//                                            ->where('employes_id',null)->get();
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


        public function complete($id){


        $service = ServiceRequest::find($id);

             if($service->payments=="Card payments"){
                 $message= "";
                 try {
                     \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

                     $strip =Charge::create ([

                         "amount" => $service->net_charge*100,
                         "currency" => "EUR",
                         "source" => \request()->stripeToken,
                         "description" => "Payment from Arisha Service For ". "DE-".$service->id ." Customer Name: " .$service->customer->name ,
                     ]);
                     $message =  'Payment successful!';
                     $service->payment_status = "Paid";
                 }
                 catch (Exception $e){
                     $message  = 'Error : '.$e->getMessage();
                     Session::flash('message', $e->getMessage());
                     return redirect()->back();
                 }
             }




        $service->status ="complete";
        $service->save();
            $service_request = $service;
            $settings = \App\Models\GeneralSettings::take(-1)->first();
            $employee =\App\Models\User::find($service_request->employes_id);
            $employee_info = Employee::find($employee->employee_id);

            $pdf = PDF::loadView('mail.TestMail', $data = [
                'service_request' => $service_request,
                'settings' => $settings,
                'employee' => $employee,
                'employee_info' => $employee_info,
            ]);


            $data["email"] = $service_request->customer->email;
            $data["title"] = "From arisha-service.com";

            Mail::send('mail.TestMail',  $data, function($message)use($data, $pdf) {
                $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->subject("Arisha Serveice")

                    ->attachData($pdf->output(), "arisha.pdf");
            });

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

        $card= [];
        if ($service_request->payments == "Card payments") {
            $card =  StripeCard::Firstwhere('service_request_id',$id);

        }

        return view('employee_dashboard.service_details', compact('service_request','card'));
    }

    public function employee_calender()
    {
        $service_request = \App\Models\ServiceRequest::where('employes_id',auth()->user()->id)->get();


        return view('employee_dashboard.employee_calender', compact('service_request'));
    }



    public function employee_bill($id){

        $settings = \App\Models\GeneralSettings::take(-1)->first();

        $service_request = ServiceRequest::find($id);
//        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ServiceRequest($data,$this->customer));

//        $service_request->paid = 1;
        $service_request->save();
//        PayslipJob::dispatch($service_request)
//            ->delay(now()->addSecond(2));


        $pdf = PDF::loadView('mail.payslip', $data = [
            'service_request' => $service_request,

        ]);

        $data["email"] = $service_request->employee->email;
        $data["title"] = "From arisha-service.com Payslip";

        Mail::send('mail.payslip',  $data, function($message)use($data, $pdf) {

            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->subject("Arisha Serveice")

                ->attachData($pdf->output(), "arisha.pdf");
        });


        return view('employees.employee_bill',compact('service_request','settings'));
    }


    protected function employee_bill_total()
    {
        $service_request = ServiceRequest::where('employes_id',auth()->user()->id)
                                            ->where('paid',0)->get();

        return view('employees.employee_bill_total',compact('service_request'));
    }

    public function delete($id)
    {
        $employee =Employee::firstWhere('id',$id)->delete();
        $user =User::firstWhere('employee_id',$id)->delete();

//        $employee->delete();
        return redirect(route('employee_list'));
    }




    public function print_user($employee){
        $emp = Employee::findOrFail($employee);


        return view('employees.profile',compact('emp' ));
    }




}
