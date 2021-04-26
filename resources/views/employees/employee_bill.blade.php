@extends('layouts.admin.base')
@section('content')
    @php
        $time = explode(':', $service_request->duration);
         $duration = ($time[0]*60) + ($time[1])
    @endphp

    @php($settings = \App\Models\GeneralSettings::take(1)->first())
    <div class="card border mt-3 p-5" id="printSection">
        <div class="text-center">
            <img
                src="https://arisha-service.de/wp-content/uploads/2019/01/49459787_362148794601522_3127704234166845440_n.png"
                alt="" style="width: 150px">
            <h5>{{$settings->name}}</h5>
            <p><i class="mdi mdi-cellphone-iphone"> </i> {{$settings->phone}}<br> <i
                    class="mdi mdi-email"></i> {{$settings->email}}</p>
            <p class="mt-0 pt-0"><strong>UST -</strong> {{$settings->ust}}, <strong>HRB -</strong> {{$settings->hrb}}
            </p>


        </div>
        <p class="bold">Rechnung-No : AS{{$service_request->id}}</p> <br>

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
                        <td class="bold">Email :</td>
                        <td>{{auth()->user()->email}}</td>
                    </tr>


                </table>
            </div>

            <div class="col-lg-5 col-sm-5">
                <table class=" table-responsive table-sm float-right">
                    <tr>
                        <td class="bold">TO</td>
                        <td>{{$service_request->employee->name}}</td>
                    </tr>
                    <tr>
                        <td class="bold">Phone</td>
                        <td>{{$service_request->employee->phone}}</td>
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
                @if ($service_request->categorie=='Transport')


                @else
                    <tr>
                        <td>Service Hours</td>
                        <td>{{$service_request->duration}}</td>
                    </tr>
                @endif

                <tr>
                    <td>Service Charge</td>
                    <td>{{$service_request->net_charge}}</td>
                </tr>
                <tr>

                    @if($service_request->categorie=='Construction')
                        <td>Duration</td>
                        <td>{{$service_request->SPM}} Sq m</td>
                    @elseif($service_request->categorie=='Transport')
                        @if($service_request->hourly=='1')
                            <td>Duration</td>

                            <td>{{$service_request->duration}}-H</td>
                        @else
                            <td>Distance</td>
                            <td>{{$service_request->distance}} KM</td>
                        @endif
                    @else
                        <td>Duration</td>
                        <td>{{$service_request->duration}}-H</td>
                    @endif
                </tr>

                <tr>


                    @if($service_request->categorie=='Construction')
                        <td>Partner Charge</td>
                        <td>{{$service_request->service->employee_charge*$service_request->SPM}}<i
                                class="mdi mdi-currency-eur"></i></td>

                    @elseif($service_request->categorie=='Transport')
                        @if($service_request->hourly=='1')
                            <td>Partner Charge</td>
                            <td>{{$service_request->service->employee_charge*$duration}}<i
                                    class="mdi mdi-currency-eur"></i></td>
                        @else
                            <td>Partner Charge</td>
                            <td>{{round(($service_request->net_charge*$service_request->service->employee_charge)/100,2)}} <i class="mdi mdi-currency-eur"></i></td>


                        @endif
                    @else
                        <td>Partner Charge</td>
                        <td>{{($service_request->service->employee_charge/60)*$duration}}<i
                                class="mdi mdi-currency-eur"></i>
                        </td>
                    @endif

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
