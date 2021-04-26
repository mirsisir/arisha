<?php

namespace App\Jobs;

use App\Mail\RequestConfirmMail;
use App\Mail\ServiceRequestMailEmp;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class RequestConfirmJob implements ShouldQueue
{
    /**
     * Create a new job instance.
     *
     * @param $servie_request
     */

    protected $servie_request;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct($servie_request)
    {
        $this->servie_request = $servie_request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        Mail::to($this->data[3])->send(new RequestRejectMail($this->data));

        Mail::to($this->servie_request->customer->email)->send( new RequestConfirmMail($this->servie_request));

        foreach($this->servie_request->service->employee as $id){
            $emp = User::find($id);
            Mail::to($emp->email)->send( new ServiceRequestMailEmp($this->servie_request));

        }


    }
}
