<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Session;
use Stripe;
use Stripe\Charge;

class StripePaymentController extends Controller
{
    public function stripe()
    {
        return view('service_complete_strip');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        try {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $strip =Charge::create ([

                "amount" => 100,
                "currency" => "EUR",
                "source" => $this->stripeToken,
                "description" => "Payment from Arisha Service For ".$this->selected_service ." Customer Name: " .$this->customer_name ,
            ]);
            $this->message =  'Payment successful!';
        }
        catch (Exception $e){
            $this->message  = 'Error : '.$e->getMessage();


            return;
        }


    }


}
