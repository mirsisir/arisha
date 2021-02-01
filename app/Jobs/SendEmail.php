<?php

namespace App\Jobs;

use App\Mail\RequestConfirmation;
use App\Mail\ServiceRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $customer;
    protected $new_request;

    public function __construct($customer, $new_request)
    {
        $this->customer = $customer;
        $this->new_request = $new_request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->new_request;

        Mail::to($this->customer->email)->send(new RequestConfirmation());
//
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ServiceRequest($data,$this->customer));
    }
}
