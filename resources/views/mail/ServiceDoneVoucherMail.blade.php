<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body>
@php($settings = \App\Models\GeneralSettings::take(1)->first())

<div class="card border mt-3 p-5" id="printSection">
    <div class="text-center">
        <img
            src="https://arisha-service.de/wp-content/uploads/2019/01/49459787_362148794601522_3127704234166845440_n.png"
            alt="" style="width: 150px">
        <h5>{{$settings->name ?? "N/A"}}</h5>
        <p><i class="mdi mdi-cellphone-iphone"> </i> {{$settings->phone ?? "N/A"}}<br> <i
                class="mdi mdi-email"></i> {{$settings->email ?? "N/A"}}</p>


    </div>
    <p class="bold">Rechnung-No : DE{{$service_request->id}}</p> <br>

    <div class="row  p-3">

        <div class="col-lg-7 col-sm-7 ">
            <table class=" table-responsive table-sm">

                <tr>
                    <td class="bold">From :</td>
                    <td>{{auth()->user()->name}}</td>
                </tr>

                <tr>
                    <td class="bold">Address :</td>
                    <td>{{auth()->user()->street}} {{auth()->user()->house_number}}<br>
                        {{auth()->user()->post_code}} {{auth()->user()->city}}
                    </td>
                </tr>

                <tr>
                    <td>Ust.ID:{{auth()->user()->employees->nid ?? " DE322171732"}}</td>
                </tr>


            </table>
        </div>

        <div class="col-lg-5 col-sm-5">
            <table class=" table-responsive table-sm float-right">
                <tr>
                    <td class="bold">TO</td>
                    <td>{{$service_request->customer->name}}</td>
                </tr>
                {{--                <tr>--}}
                {{--                    <td class="bold">Phone</td>--}}
                {{--                    <td>{{$service_request->customer->phone}}</td>--}}
                {{--                </tr>--}}
                <tr>
                    <td class="bold">Address</td>
                    <td>{{$service_request->customer->street}} {{$service_request->customer->house_number}}<br>
                        {{$service_request->customer->post_code}} {{$service_request->customer->city}}
                    </td>
                </tr>
                {{--                <tr>--}}
                {{--                    <td class="bold">Email</td>--}}
                {{--                    <td>{{$service_request->customer->email}}</td>--}}
                {{--                </tr>--}}

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

            @if($service_request->hourly ==1)
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
            @php( $employee =\App\Models\User::find($service_request->employes_id))
            @if($employee->role=="admin" )
                <tr>
                    <td>Service vat(19%)</td>
                    <td>{{$service_request->total_charge - $service_request->net_charge}}</td>
                </tr>
                <tr>
                    <td>Total Charge</td>
                    <td>{{$service_request->total_charge}}</td>
                </tr>
            @endif

        </table>

        <br>
        <table class="m-3">
            <tr>
                <td>Arisha Service DE</td>
            </tr>
            <tr>
                <td>Pastor-Niemöller-Platz 2, 13156 Berlin.</td>
            </tr>

            <tr>
                <td>arishaservice@gmail.com</td>
            </tr>

            <tr>
                <td>Please Make Payments To</td>
            </tr>
            <tr>
                <td>Post Bank : Mohammad Islam</td>
            </tr>
            <tr>
                <td>IBAN : DE26 100 100 100 820 9131 21</td>
            </tr>

        </table>
        <br>
        <br>
        <br>
        <br>

        @if($role !=="admin" )
            <div class="m-3">
                <small class=" text-justify">Der Rechnungssteller ist Kleinunternehmer im Sinne des §19 UStG und
                    weist daher keine Umsatzsteuer aus. Vielen Dank für Ihr Vertrauen! Hiermit berechnen wir Ihnen
                    im Namen und für Rechnung des Reinigungsunternehmers folgende Leistungen:</small>

            </div>
        @endif

    </div>
</div>


</body>
</html>
