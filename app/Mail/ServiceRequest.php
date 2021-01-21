<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServiceRequest extends Mailable
{
    use Queueable, SerializesModels;

    private $data;
    private $customer;

    /**
     * Create a new message instance.
     *
     * @param $data
     * @param $customer
     */
    public function __construct($data,$customer)
    {
        //
        $this->data = $data;
        $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.ServiceRequest')
                        ->with([
                'data' => $this->data,
                'customer' => $this->customer,

            ]);

    }

//    public function build()
//    {
//        return $this->view('emails.orders.shipped')

//    }
}
