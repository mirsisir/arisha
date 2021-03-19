<?php

namespace App\Http\Controllers;

use App\Mail\ServiceDoneVoucherMail;
use App\Models\Employee;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\StripeCard;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Session;
use Stripe\Charge;
use Exception;

use PDF;

class ServiceControlle extends Controller
{
    public function today_request()
    {

        view::share("title", "Today's Service Request");

//        $all_service = ServiceRequest::find(2)->date;
//            dd($all_service,Carbon::today()->toDateString());
        $all_service_request = ServiceRequest::where('date', Carbon::today()->toDateString())
            ->where('status', 'confirm')->get();

        return view('service.today_request', compact('all_service_request'));
    }

    public function hold_request()
    {
        view::share("title", "Hold Service Request");

        $all_service_request = ServiceRequest::where('status', 'hold')->orderBy('date')->get();

        return view('service.hold_request', compact('all_service_request'));
    }

    public function confirm_hold_request($id)
    {

        $service = ServiceRequest::find($id);
        $service->status = "confirm";
        $service->save();
        return redirect(route('hold_request'));
    }

    public function complete_request($id)
    {

        $service = ServiceRequest::find($id);
        $service->status = "complete";
        $service->save();
        return redirect(route('confirm_request'));
    }


    public function reject_request($id)
    {

        $service = ServiceRequest::find($id);
//        dd($service);
        $service->delete();
        return redirect(route('hold_request'));
    }


    public function confirm_request()
    {

        view::share("title", "Confirms Service Request");

        $all_service_request = ServiceRequest::where('status', 'confirm')->get();

        return view('service.confirm_request', compact('all_service_request'));
    }


    public function service_details($id)
    {
        view::share('title','Service Details');
        $service_request = ServiceRequest::find($id);
        $all_employee = User::all()->where('role','employee');
        $all_admin = User::all()->where('role','admin');
        $all_employee =$all_employee->merge($all_admin);

        $card= [];
            if ($service_request->payments == "Card payments") {
                $card =  StripeCard::Firstwhere('service_request_id',$id);

            }

        return view('service_details', compact('service_request','all_employee','all_admin','card'));
    }

    public function service_details_update($id)
    {
        $service_request = ServiceRequest::find($id);
//        dd(explode(".",$service_request->total_charge));




        if ($service_request->categorie == "Cleaning") {

            if (\request('duration')){
                $up_price = $service_request->service->charge * (explode(":",\request('duration'))[0])  ;
                $up_price_min = ($service_request->service->charge/60) * (explode(":",\request('duration'))[1])  ;
                $up_price_min = round($up_price_min, 1);
                $service_request->net_charge = $up_price + $up_price_min;
                $service_request->duration = \request('duration');
            }




//            if(!empty( \request('employee'))){
//                $service_request->employes_id = \request('employee');
//
//            }

        } elseif ($service_request->categorie == "Construction") {

            $service_request->SPM = \request('square_meter');

            $service_request->net_charge = ($service_request->service->SPM ?? 0) * \request('square_meter');

        }
        elseif ($service_request->categorie == "Transport") {


            if ($service_request->hourly == 1) {

                $service_request->net_charge = ($service_request->service->charge) * \request('duration');

            }
            else {

                $service_request->distance = \request('distance');
                $service_request->waiting_charge = \request('waiting');
                $service_request->stopover_charge = \request('stopover');

                $service_request->net_charge = $service_request->service->basic_price  + (($service_request->service->km_price ) * $service_request->distance );
                $service_request->net_charge += $service_request->stopover_charge;

                $time = explode(':', $service_request->waiting_charge);
                $time = ($time[0]*60) + ($time[1]);

                $service_request->net_charge +=(($time/5)*$service_request->service->waiting_price);


                $service_request->net_charge=(round($service_request->net_charge, 2));


            }
        }

        $this->vat = ($service_request->net_charge * 19) / 100;

        $service_request->total_charge = $service_request->net_charge + $this->vat;
        $service_request->total_charge = (round($service_request->total_charge, 2));

        $service_request->employes_id =\request('employee') ;


        $service_request->save();

        return redirect(route('service_details',$id));
    }

    public function service_details_update_emp($id)
    {
        $service_request = ServiceRequest::find($id);


        if ($service_request->categorie == "Cleaning") {


            $up_price = $service_request->service->charge * (explode(":",\request('duration'))[0])  ;
            $up_price_min = ($service_request->service->charge/60) * (explode(":",\request('duration'))[1])  ;

            $up_price_min = round($up_price_min, 1);


            $service_request->net_charge = $up_price + $up_price_min;
            $service_request->duration = \request('duration');

//            if(!empty( \request('employee'))){
//                $service_request->employes_id = \request('employee');
//
//            }

        } elseif ($service_request->categorie == "Construction") {

            $service_request->SPM = \request('square_meter');

            $service_request->net_charge = ($service_request->service->SPM ?? 0) * \request('square_meter');

        }
        elseif ($service_request->categorie == "Transport") {


            if ($service_request->hourly == 1) {

                $service_request->net_charge = ($service_request->service->charge) * \request('duration');

            }
            else {

                $service_request->distance = \request('distance');
                $service_request->waiting_charge = \request('waiting');
                $service_request->stopover_charge = \request('stopover');

                $service_request->net_charge = $service_request->service->basic_price  + (($service_request->service->km_price ) * $service_request->distance );
                $service_request->net_charge += $service_request->stopover_charge;

                $time = explode(':', $service_request->waiting_charge);
                $time = ($time[0]*60) + ($time[1]);

                $service_request->net_charge +=(($time/5)*$service_request->service->waiting_price);


                $service_request->net_charge=(round($service_request->net_charge, 2));



            }
        }

        $this->vat = ($service_request->net_charge * 19) / 100;

        $service_request->total_charge = $service_request->net_charge + $this->vat;
        $service_request->total_charge = (round($service_request->total_charge, 2));

//        $service_request->employes_id =\request('employee') ;


        $service_request->save();

        return view('employee_dashboard.service_details', compact('service_request'));
    }


    public function all_services()
    {

        $all_service = DB::table('services')->orderBy('category')->get();

        $cleaning = DB::table('services')->where('category','Cleaning')->get();
        $construction = DB::table('services')->where('category','Construction')->get();
        $transport = DB::table('services')->where('category','Transport')->get();





        return view('website.all_service', compact('all_service','cleaning','construction','transport'));
    }

    public function service_done_report($id)
    {


        $service_request = ServiceRequest::find($id);

        if ($service_request->payments == "Card Payments"){
            $message= "";
            try {
                \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

                $strip =Charge::create ([

                    "amount" => $service_request->total_charge*100,
                    "currency" => "EUR",
                    "source" => \request()->stripeToken,
                    "description" => "Payment from Arisha Service For ". "DE-".$service_request->id ." Customer Name: " .$service_request->customer->name ,
                ]);
                $message =  'Payment successful!';
                $service_request->payment_status = "Paid";
            }
            catch (Exception $e){
                $message  = 'Error : '.$e->getMessage();
                Session::flash('message', $e->getMessage());
                return redirect()->back();
            }
        }


        if (empty($service_request->employee)) {
            $service_request->employes_id = auth()->user()->id;
        }
        $service_request->status = "complete";
        $service_request->save();
      $settings = \App\Models\GeneralSettings::take(-1)->first();
         $employee =\App\Models\User::find($service_request->employes_id);


        $pdf = PDF::loadView('mail.TestMail', $data = [
            'service_request' => $service_request,
            'settings' => $settings,
            'employee' => $employee,
        ]);


        $data["email"] = $service_request->customer->email;
        $data["title"] = "From arisha-service.com";

        Mail::send('mail.TestMail',  $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->subject("Arisha Serveice")

                ->attachData($pdf->output(), "arisha.pdf");
        });


//        Mail::to($service_request->customer->email)->send(new ServiceDoneVoucherMail($service_request));

        return view('voucher.service_done_voucher', compact('service_request'));

    }
    public function service_done_report_without_voucher($id)
    {
        $service_request = ServiceRequest::find($id);


        $service_request->status = "complete";
        $service_request->save();

        return view('voucher.service_done_voucher', compact('service_request'));
    }

    public function partner_allocate()
    {
        $all_employee = User::where('role', 'employee')->get();
        $all_services = Service::all();

        return view('employees.partner_allocate', compact('all_employee', 'all_services'));
    }

    public function partner_allocate_save()
    {

        $validated = \request()->validate([

            'service' => 'required',
            'employees' => 'required',
            'service_charge' => 'required',
        ]);

        $service = Service::find(\request('service'));
        $service->employee = \request('employees');
        $service->employee_charge = \request('service_charge');
        $service->save();

        session()->flash('message', 'Partner Allocated');


        return Redirect::route(('partner_allocate'));

    }


    public function partner_allocate_list()
    {
        $all_employee = User::where('role', 'employee')->get();
        $all_services = Service::all();

        return view('employees.partner_allocate_list', compact('all_employee', 'all_services'));
    }


    public function partner_allocate_remove($service, $emp)
    {

        $ser = Service::find($service);

        $array = $ser->employee;
        $array = \array_diff($array, [$emp]);

        $ser->employee = $array;
        $ser->save();

        return Redirect::route(('partner_allocate_list'));
    }

//partner_bill

    public function partner_bill()
    {
        view::share('title','Partner Bill');

        $service = ServiceRequest::where('status', 'complete')
                                    ->where('paid', 0)
                                    ->get();

        return view('employees.partner_bill', compact('service'));
    }
    public function partner_bill_report()
    {
        view::share('title','Partner Bill Report');

        $service = ServiceRequest::where('status', 'complete')
                                    ->where('paid', 1)
                                    ->get();

        return view('employees.partner_bill_report', compact('service'));
    }

    public function partner_service_delete($id)
    {
        $service = ServiceRequest::find($id);
        $service->delete();

        return redirect( route('partner_bill_report'));
    }




}
