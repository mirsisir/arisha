<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Stripe;

class StripePaymentController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $strip =Stripe\Charge::create ([
            "amount" => 100 * 100,
            "currency" => "EUR",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);


        Session::flash('success', 'Payment successful!'.$strip->id);

        return back();
    }


}
