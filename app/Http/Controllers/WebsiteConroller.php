<?php

namespace App\Http\Controllers;


use App\Models\Employee;
use App\Models\Service;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class WebsiteConroller extends Controller
{
    public function partner_registration(){

        $all_service = Service::all();

        return view('website.partner-registration',compact('all_service'));

    }

    public function partner_registration_save(){

        $data =  \request()->validate([
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'nid' => 'required',
            'photo' => 'required|image|max:1024',

            'address' => 'required',
            'street' => 'required',
            'city' => 'required',
            'post_code' => 'required',

            'phone' => 'required',
            'email' => 'required',

            'service' => 'required',
        ]);


        $employee = new Employee;

        $employee->fname = \request('fname');
        $employee->lname = \request('fname');
        $employee->gender = \request('gender');
        $employee->nation = \request('nation');
        $employee->nid = \request('nid');
        $employee->acc_number = \request('acc_number');


        $employee->address = \request('address');
        $employee->street = \request('street');
        $employee->city = \request('city');
//        $employee->post_code = \request('post_code');

        $employee->phone = \request('phone');
        $employee->mobile = \request('phone');
        $employee->email = \request('email');

        $employee->service = \request('service');

        $employee->photo = \request()->photo->store('images', 'public');

        if(!empty(\request()->business_licence)){
            $employee->business_licence = \request()->business_licence->store('images', 'public');

        }
        if(!empty(\request()->house_clearence)){
        $employee->other = \request()->house_clearence->store('images', 'public');

        }
        if(!empty(\request()->nid_card)){
        $employee->id_proff = \request()->nid_card->store('images', 'public');

        }

//
        $employee->save();




//        \request()->logo->store('images', 'public');

        return redirect(route('partner_registration',app()->getLocale()));
    }


    public function customer_dashboard(){

        $pending_service = ServiceRequest::where('customer_id',auth()->user()->id)
                                        ->where('status','pending')->get();

        $hold_service = ServiceRequest::where('customer_id',auth()->user()->id)
                                        ->where('status','hold')->get();

        $confirm_service = ServiceRequest::where('customer_id',auth()->user()->id)
                                        ->where('status','confirm')->get();

        $complete_service = ServiceRequest::where('customer_id',auth()->user()->id)
                                        ->where('status','complete')->get();

        return view('website.customer_dashboard',compact('pending_service','hold_service','confirm_service','complete_service'));
    }










}
