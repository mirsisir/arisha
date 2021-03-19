<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;
class ServiceDoneVoucherMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param $service_request
     */
    private $service_request;
    public function __construct($service_request)
    {

        $this->service_request = $service_request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

//        $pdf = PDF::loadView('mail.TestMail', $data = [
//            'service_request' => $this->service_request,
//        ]);

        return $this->view('mail.ServiceDoneVoucherMail')
            ->with([
                'service_request' =>$this->service_request
            ]);
//            ->attachData($pdf->output(), "arisha.pdf");
    }
}
