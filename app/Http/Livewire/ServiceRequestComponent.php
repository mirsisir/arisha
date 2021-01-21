<?php

namespace App\Http\Livewire;

use App\Models\ServiceRequest;
use Illuminate\Support\Facades\View;
use Livewire\Component;

class ServiceRequestComponent extends Component
{
    public $all_service_request;


    public function mount(){
        view::share("title","New Service Request");

    }

    public function confirm($s_id){
        $servie_request = ServiceRequest::find($s_id);
        $servie_request->status = 'confirm';
        $servie_request->save();
        $this->redirect('ServiceRequest');

    }
    public function reject($s_id){
        $servie_request = ServiceRequest::find($s_id);
//        dd($servie_request);
        $servie_request->delete();
        $this->redirect('ServiceRequest');

    }
    public function hold($s_id){
        $servie_request = ServiceRequest::find($s_id);
        $servie_request->status = 'hold';
        $servie_request->save();
        $this->redirect('ServiceRequest');

    }


    public function render()
    {
        $this->all_service_request = ServiceRequest::where('status', 'pending')->get();
        return view('livewire.service-request-component')->layout('layouts.admin.base');
    }
}
