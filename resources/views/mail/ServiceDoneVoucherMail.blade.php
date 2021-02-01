

@php($settings = \App\Models\GeneralSettings::take(1)->first())


    <div class="card border mt-3 p-5" id="printSection">
        <div class="text-center">
            <img
                src="https://arisha-service.de/wp-content/uploads/2019/01/49459787_362148794601522_3127704234166845440_n.png"
                alt="" style="width: 150px">
            <h5>{{$settings->name}}</h5>
            <p> <i class="mdi mdi-cellphone-iphone"> </i> {{$settings->phone}}<br>  <i class="mdi mdi-email"></i> {{$settings->email}}</p>


        </div>
        <p class="bold">Rechnung-No : ARS{{$service_request->id}}</p> <br>

        <div class="row  p-3">

            <div class="col-lg-7 col-sm-7 ">

                    | From :                                                                  | TO
                    | -------------                                                          |:-------------:
                    | {{auth()->user()->name}}                                               | {{$service_request->customer->name}}
                    | {{auth()->user()->phone}}                                              | {{$service_request->customer->phone}}
                    |{{auth()->user()->street}} {{auth()->user()->house_number}}
                    |{{auth()->user()->post_code}} {{auth()->user()->city}}                  | {{$service_request->customer->street}} {{$service_request->customer->house_number}}
                                                                                            |{{$service_request->customer->post_code}} {{$service_request->customer->city}}
                    |{{auth()->user()->email}}                                                 | {{$service_request->customer->email}}


            </div>

        </div>
        <div class="border mt-3">
            <table class="table table-striped">
                <tr>
                    <td>Service Name</td>
                    <td>{{$service_request->service->name}}</td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>{{$service_request->date}}</td>
                </tr>
                <tr>
                    <td>Start time</td>
                    <td>{{$service_request->start_time}}</td>
                </tr>

                <tr>
                    <td>Service Hours</td>
                    <td>{{$service_request->duration}}</td>
                </tr>
                <tr>
                    <td>Service Charge</td>
                    <td>{{$service_request->net_charge}}</td>
                </tr>
                <tr>
                    <td>Service vat(19%)</td>
                    <td>{{$service_request->total_charge - $service_request->net_charge}}</td>
                </tr>
                <tr>
                    <td>Total Charge</td>
                    <td>{{$service_request->total_charge}}</td>
                </tr>


            </table>


        </div>


    </div>



Thanks,<br>



