<?php

namespace App\Http\Livewire\Website;

use App\Jobs\SendEmail;
use App\Mail\RequestConfirmation;
use App\Models\Category;
use App\Models\Employee;
use App\Models\PickoffAddress;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class ServiceOrderComponent extends Component
{
    public $category, $selected_category, $foo;
    public $service, $selected_service;
    public $employee, $selected_employee;
    public $duration = 1, $time, $start_time, $notes, $payments, $date;
    public $customer_name, $phone, $email, $address;
    public $record, $customer;
    public $total_start_time = [], $total_duration;
    public $postcode, $city, $house_number, $street, $date_time;
    public $square_meter = 50;

    public $receiver_name, $receiver_phone, $receiver_email, $receiver_street, $receiver_house, $receiver_postcode, $receiver_city, $receiver_notes;

    public $service_name, $total_charge, $net_sum, $vat, $distance_price, $base_price, $distance;

    public $dates = [];
    public $weekly_day = [];
    public $weekly = false;
    public $week_count;
    public $start_date_time;
    public $end_date_time;
    public $weekly_time;
    public $daily_time=[];


    public function mount()
    {


        $this->dates = [''];
        $this->daily_time = [''];
        $this->category = Category::all();
        $this->employee = Employee::all();
        $customer = auth()->user();
        $this->customer_name = $customer->name;
        $this->phone = $customer->phone;
        $this->email = $customer->email;

        $this->city = $customer->city;
        $this->house_number = $customer->house_number;
        $this->street = $customer->street;
        $this->postcode = $customer->post_code;
        $this->notes = $customer->notes;


    }

    public function updatedSelectedCategory()
    {
        $this->service = Service::where('category', $this->selected_category)->get();


    }

    public function updated()
    {
        if ($this->selected_employee && $this->date) {
            $record = \App\Models\ServiceRequest::where('date', $this->date)
                ->where('employee_id', $this->selected_employee)->get();

            if (count($record) > 0) {
                foreach ($record as $r) {
                    $this->total_start_time[] = $r->start_time;
//                    $this->total_duration[] = $r->duration ;

                    for ($i = 1; $i < $r->duration; $i++) {

                        $dateString = $r->start_time . ':00:00';
                        $date = new DateTime($dateString);

                        $this->total_start_time[] = (intval($date->format('H')) + $i) % 24;
                    }

                }
            } else {
                $this->total_start_time = [];
            }

        }


    }

    public function request()
    {




        $validatedData = $this->validate([
            'selected_category' => 'required',
            'selected_service' => 'required',
//            'selected_employee'=>'required',

//            'date_time'=>'required',
            'dates.*' => 'required_if:weekly,false|min:2',
            'daily_time.*' => 'required_if:weekly,false|min:2',

            'weekly_time' => 'required_if:weekly,true|min:2',
            'start_date_time' => 'required_if:weekly,true|min:2',
            'end_date_time' => 'required_if:weekly,true|min:2',
            'weekly_day' => 'required_if:weekly,true|min:2',


            'notes' => 'required',
            'payments' => 'required',

            'customer_name' => 'required',
            'phone' => 'required',
            'email' => 'required',

            'square_meter' => 'required_if:selected_category,Construction|numeric|min:50'

//            'square_meter'=>'required_if:category,Construction',

        ]);


//        dd( (explode("T",$this->date_time)[1]));

        //        public $receiver_name,$receiver_phone,$receiver_email,$receiver_street,$receiver_house,$receiver_postcode,$receiver_city,$receiver_notes;

    if ($this->weekly){
        $this->dates = [];

        foreach ($this->weekly_day as $day) {
            $dateTo = Carbon::parse($this->end_date_time);
            $day = Carbon::parse($this->start_date_time . ' next' . " " . $day);

            while ($day->lt($dateTo)) {
                $this->dates[] = $day->toDateString();
                $day->addWeek();
            }
        }
    }


        foreach ($this->dates as $index=>$date) {

            if ($this->selected_category == "Transport") {

                $pickoff = new PickoffAddress;
                $pickoff->name = $this->receiver_name;
                $pickoff->phone = $this->receiver_phone;
                $pickoff->email = $this->receiver_email;
                $pickoff->street = $this->receiver_street;
                $pickoff->house_number = $this->receiver_house;
                $pickoff->post_code = $this->receiver_postcode;
                $pickoff->city = $this->receiver_city;
                $pickoff->notes = $this->receiver_notes;
                $pickoff->save();

            }

            $new_request = new ServiceRequest;

            $new_request->customer_id = auth()->user()->id;
            $new_request->customer_phone = $this->phone;

            $new_request->service_id = $this->selected_service;
            $new_request->categorie = $this->selected_category;

            $new_request->duration = $this->duration;

            if ($this->weekly){
                $new_request->start_time = $this->weekly_time;

            }else{
                $new_request->start_time = $this->daily_time[$index];

            }


            $new_request->date = $date;

            $new_request->notes = $this->notes;
            $new_request->payments = $this->payments;

            $new_request->street = $this->street;
            $new_request->house_number = $this->house_number;
            $new_request->post_code = $this->postcode;
            $new_request->city = $this->city;

//        construction  service

            $new_request->SPM = $this->square_meter;
//        moving service
            if ($this->selected_category == "Transport") {
                $new_request->pickoff_addresses_id = $pickoff->id;

            }

            $new_request->total_charge = $this->total_charge;


            $new_request->save();


            $customer = User::find(auth()->user()->id);
            $customer->street = $this->street;
            $customer->house_number = $this->house_number;;
            $customer->post_code = $this->postcode;
            $customer->city = $this->city;

            $customer->save();


            SendEmail::dispatch($customer)->delay(Carbon::now()->addSecond(5));

        }

//        Mail::to($this->email)->send( new RequestConfirmation());
//
//        Mail::to($this->email)->send(new \App\Mail\ServiceRequest($new_request ,$customer));


        return redirect('en/services_request_confirm');


    }

    public function addDates()
    {
        $this->dates[] = [''];
    }


    public function render()
    {
        $this->service_name = \App\Models\Service::find($this->selected_service);
        $service = \App\Models\Service::find($this->selected_service);
        $service_charge = $service->charge ?? 0;

        if ($this->selected_category == "Cleaning") {
            $this->net_sum = $service_charge * $this->duration;
        } elseif ($this->selected_category == "Construction") {
            $this->net_sum = ($service->SPM ?? 0) * $this->square_meter;
        } elseif ($this->selected_category == "Transport") {
            $this->distance = 10;
            if ($service->hourly ?? 0 == 1) {
                $this->net_sum = ($service->charge ?? 0) * $this->distance;
            } else {
                $this->net_sum = ($service->basic_price ?? 0) + (($service->km_price ?? 0) * $this->distance);
            }
        }

        $this->vat = ($this->net_sum * 19) / 100;

        $this->total_charge = $this->net_sum + $this->vat;


        return view('livewire.website.service-order-component')->layout('layouts.web.web_base');
    }
}
