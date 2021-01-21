<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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

        $all_service_request = ServiceRequest::where('status', 'hold')->get();

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
        $service_request = ServiceRequest::find($id);
        return view('service_details', compact('service_request'));
    }

    public function service_details_update($id)
    {
        $service_request = ServiceRequest::find($id);



        if ($service_request->categorie == "Cleaning") {

            $service_request->net_charge = $service_request->service->charge * \request('duration');
            $service_request->duration = \request('duration');

        }
        elseif ($service_request->categorie == "Construction") {

            $service_request->SPM = \request('square_meter');
            $service_request->net_charge = ($service_request->SPM ?? 0) * \request('square_meter');

        }
//        elseif ($service_request->categorie == "Transport") {
//
//            $this->distance = 10;
//            if ($service->hourly ?? 0 == 1) {
//                $service_request->net_charge = ($service->charge ?? 0) * $this->distance;
//            } else {
//                $service_request->net_charge = ($service->basic_price ?? 0) + (($service->km_price ?? 0) * $this->distance);
//            }
//        }

        $this->vat = ($service_request->net_charge * 19) / 100;

        $service_request->total_charge = $service_request->net_charge + $this->vat;



        $service_request->save();

        return view('service_details', compact('service_request'));
    }

    public function all_services()
    {

        $all_service = Service::all();

        return view('website\all_service', compact('all_service'));
    }
}
