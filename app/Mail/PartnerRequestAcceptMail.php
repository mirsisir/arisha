<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PartnerRequestAcceptMail extends Mailable
{
    use Queueable, SerializesModels;

    private $Emp;
    private $password;

    /**
     * Create a new message instance.
     *
     * @param $Emp
     * @param $password
     */
    public function __construct($Emp,$password)
    {
        $this->Emp = $Emp;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.PartnerRequestAcceptMail')
            ->with([
                'Emp' => $this->Emp,
                'password' => $this->password,

            ]);
    }
}
