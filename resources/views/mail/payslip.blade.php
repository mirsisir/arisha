<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<style>
    .table {
        width: 100%;
        border-collapse: collapse;

    }

    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>

@php
    $time = explode(':', $service_request->duration);
     $duration = ($time[0]*60) + ($time[1])
@endphp

@php($settings = \App\Models\GeneralSettings::take(1)->first())
<div class="card border mt-3 p-5" >
    <div class="text-center" style="text-align: center;">
        <img
            src="http://arisha-service.de/storage/images/9I83VI8nm6Szs3ZR7PIaZhdfLt4gRyppEDURviHU.png"
            alt="" style="width: 150px">
        <h3>{{$settings->name}}</h3>
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
                <tr><td>Ust.ID: DE322171732</td></tr>


            </table>
        </div>
        <br>
        <br>
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
                    <td>{{$service_request->employee->email}}</td>
                </tr>
                <tr>
                    <td class="bold">ID : </td>
                    <td>{{$emp->nid ?? " "}}</td>
                </tr>

            </table>

        </div>
    </div>
    <br><br>
    <div class="border mt-3">
        <table class="table">
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

</body>
</html>
