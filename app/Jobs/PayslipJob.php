<?php

namespace App\Jobs;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

use PDF;

class PayslipJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $service_request;

    public function __construct($service_request)
    {
        $this->service_request = $service_request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
                $pdf = PDF::loadView('mail.payslip', $data = [
            'service_request' => $this->service_request,

        ]);

        $data["email"] = $this->service_request->employee->email;
        $data["title"] = "From arisha-service.com Payslip";

        Mail::send('mail.payslip',  $data, function($message)use($data, $pdf) {

            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->subject("Arisha Serveice")

                ->attachData($pdf->output(), "arisha.pdf");
        });
    }
}
