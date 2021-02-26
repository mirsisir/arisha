<?php

namespace App\Http\Controllers;


use App\Models\Employee;
use App\Models\Service;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Session;

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

            'phone' => 'required|unique:employees',
            'email' => 'required',

            'service' => 'required',
        ]);


        $employee = new Employee;

        $employee->fname = \request('fname');
        $employee->lname = \request('fname');
        $employee->gender = \request('gender');
        $employee->nation = \request('nation');
        $employee->nid = \request('nid');
        $employee->acc_number = \request('bank_account');
        $employee->bank = \request('bank_name');
        $employee->acc_name = \request('acc_name');


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

        $employee->save();







        Session::flash('message', 'Partner Registration Request Confirm');

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



    public function customer_profile(){

        $user = auth()->user();

        return view('website.customer_profile',compact('user'));
    }
    public function customer_profile_update(){

        $user = auth()->user();
        $user->name = \request('name');
        $user->email = \request('email');
//        $user->phone = \request('phone');
        $user->street = \request('street');
        $user->house_number = \request('house_number');
        $user->post_code = \request('post_code');
        $user->city = \request('city');
        $user->save();

        session()->flash('message', 'Profile Updated!');

        return redirect(route('customer_profile',app()->getLocale()));
    }










}
