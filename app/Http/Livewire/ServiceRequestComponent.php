<?php

namespace App\Http\Livewire;

use App\Jobs\RequestConfirmJob;
use App\Jobs\RequestRejectJob;
use App\Jobs\SendEmail;
use App\Mail\RequestConfirmation;
use App\Mail\RequestRejectMail;
use App\Mail\ServiceRequestMailEmp;
use App\Models\ServiceRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Livewire\Component;

class ServiceRequestComponent extends Component
{
    public $all_service_request;


    public function mount()
    {

        view::share("title", "New Service Request");

    }

    public function confirm($s_id)
    {
        $servie_request = ServiceRequest::find($s_id);
        $servie_request->status = 'confirm';
        $servie_request->save();
        $customer =$servie_request->customer;



       RequestConfirmJob::dispatch($servie_request)->delay(Carbon::now()->addSecond(2));



        $this->redirect('ServiceRequest');

//        \Artisan::call('queue:work --stop-when-empty');

    }

    public function reject($s_id)
    {
        $servie_request = ServiceRequest::find($s_id);
//        dd($servie_request);

        $data = [
            $service_name = $servie_request->service->name,
            $service_date = $servie_request->date,
            $service_time = $servie_request->start_time,
            $mail = $servie_request->customer->email,

        ];
//        SendEmail::dispatch($customer,$new_request)->delay(Carbon::now()->addSecond(3));
//        Mail::to('Ridita@gmail.com')->send(new RequestRejectMail($data));
        RequestRejectJob::dispatch($data)->delay(Carbon::now()->addSecond(2));

        $servie_request->delete();
        $this->redirect('ServiceRequest');
    }

    public function hold($s_id)
    {
        $servie_request = ServiceRequest::find($s_id);
        $servie_request->status = 'hold';
        $servie_request->save();
        $this->redirect('ServiceRequest');

    }


    public function render()
    {
        $this->all_service_request = ServiceRequest::where('status', 'pending')->orderBy('date')->get();

        return view('livewire.service-request-component')->layout('layouts.admin.base');
    }
}
