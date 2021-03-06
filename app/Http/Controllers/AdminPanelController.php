<?php

namespace App\Http\Controllers;

use App\Models\GeneralSettings;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Mail;


class AdminPanelController extends Controller
{
    //General_settings_save

    public function general_settings(){
        view::share('title','General Settings');

        return view('general_settings');
    }

    public function general_settings_save(){

        $settings = \App\Models\GeneralSettings::take(1)->first();
        if (empty($settings)){
            $settings = new GeneralSettings();
        }

        $settings->name = \request('name');
        $settings->phone = \request('phone');
        $settings->email = \request('email');

        $settings->street = \request('street');
        $settings->house_number = \request('house_number');
        $settings->post_code = \request('post_code');
        $settings->city = \request('city');
        $settings->hrb = \request('hrb');
        $settings->ust = \request('ust');
        $settings->logo =  \request()->logo->store('images', 'public');
        $settings->save();

        return Redirect::route(('general_settings'));

    }


    public function index()
    {
        $data["email"] = "aatmaninfotech@gmail.com";
        $data["title"] = "From ItSolutionStuff.com";
        $data["body"] = "This is Demo";

        $pdf = PDF::loadView('mail.TestMail', $data);

        Mail::send('mail.TestMail', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), "text.pdf");
        });

        dd('Mail sent successfully');
    }
}
