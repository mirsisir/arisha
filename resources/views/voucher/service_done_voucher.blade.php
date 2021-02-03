@extends('layouts.admin.base')
@section('content')

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
                <table class=" table-responsive table-sm">

                    <tr>
                        <td class="bold">From :</td>
                        <td>{{auth()->user()->name}}</td>
                    </tr>
                    <tr>
                        <td class="bold">Phone :</td>
                        <td>{{auth()->user()->phone}}</td>
                    </tr>
                    <tr>
                        <td class="bold">Address :</td>
                        <td>{{auth()->user()->street}} {{auth()->user()->house_number}}<br>
                            {{auth()->user()->post_code}} {{auth()->user()->city}}
                        </td>
                    </tr>
                    <tr>
                        <td class="bold">Email :</td>
                        <td>{{auth()->user()->email}}</td>
                    </tr>


                </table>
            </div>

            <div class="col-lg-5 col-sm-5">
                <table class=" table-responsive table-sm float-right">
                    <tr>
                        <td class="bold">TO</td>
                        <td>{{$service_request->customer->name}}</td>
                    </tr>
                    <tr>
                        <td class="bold">Phone</td>
                        <td>{{$service_request->customer->phone}}</td>
                    </tr>
                    <tr>
                        <td class="bold">Address</td>
                        <td>{{$service_request->customer->street}} {{$service_request->customer->house_number}}<br>
                            {{$service_request->customer->post_code}} {{$service_request->customer->city}}
                        </td>
                    </tr>
                    <tr>
                        <td class="bold">Email</td>
                        <td>{{$service_request->customer->email}}</td>
                    </tr>

                </table>

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
    <div class="text-center pt-4">
        <button onclick="Print('printSection')" class="btn btn-success">Print</button>
    </div>

    <script>
        function Print(printSection) {

            var printContents = document.getElementById(printSection).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>

@endsection