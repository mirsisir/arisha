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
    .table_name {
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

<div class="card border mt-3 p-5" id="printSection" style="text-align: center;">
    <div class="text-center">
            <img src="http://arisha-service.de/storage/images/9I83VI8nm6Szs3ZR7PIaZhdfLt4gRyppEDURviHU.png" style="height: 110px" alt="">

                          <h1>{{$settings->name ?? "N/A"}}</h1>
        <p> <i class="mdi mdi-cellphone-iphone"> </i> {{$settings->phone ?? "N/A"}}<br>
            <i class="mdi mdi-email"></i> {{$settings->email ?? "N/A"}}</p>


    </div>
    <p class="bold">Rechnung-No : DE {{$service_request->id}}</p> <br>

    <div class="row  p-3">

        <div class="col-lg-7 col-sm-7 ">
            <table class="table_name">
                <tr>
                    <th>Form</th>
                    <th>To</th>
                </tr>
                <tr>
                    <td>{{auth()->user()->name ?? ""}}</td>
                    <td>{{$service_request->customer->name ?? ""}}</td>
                </tr>
                <tr>
                    <td>{{auth()->user()->phone}}</td>
                    <td>{{$service_request->customer->phone ?? ""}}</td>
                </tr>
                <tr>
                    <td>{{auth()->user()->email}}</td>
                    <td>{{$service_request->customer->email ?? ""}}</td>
                </tr>
                <tr>
                    <td class="">
                        {{auth()->user()->street}} {{auth()->user()->house_number}}<br>
                        {{auth()->user()->post_code}} {{auth()->user()->city}}</td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td>{{$employee_info->nid ?? "DE322171732"}}</td>
                </tr>
            </table>
        </div>

        <br><br>

    </div>
    <div class="border mt-3">
        <table id="customers">
            <tr>
                <td>Service Name</td>
                <td>{{$service_request->service->name ?? ""}}</td>
            </tr>
            <tr>
                <td>Date</td>
                <td>{{$service_request->date ?? ""}}</td>
            </tr>
            <tr>
                <td>Start time</td>
                <td>{{$service_request->start_time ?? ""}}</td>
            </tr>
            @if($service_request->categorie =="Cleaning")
            <tr>
                <td>Service Hours</td>
                <td>{{$service_request->duration ?? ""}}</td>
            </tr>
            @endif
            <tr>
                <td>Service Charge</td>
                <td>{{$service_request->net_charge ?? ""}}</td>
            </tr>
            @if($employee->role=="admin" )
                <tr>
                    <td>Service vat(19%)</td>
                    <td>{{$service_request->total_charge - $service_request->net_charge ?? ""}}</td>
                </tr>
                <tr>
                    <td>Total Charge</td>
                    <td>{{$service_request->total_charge ?? ""}}</td>
                </tr>
            @endif

        </table>
        <br>
        <br>
        <br>
        <table class="m-3">
            <tr>
                <td>Arisha Service</td>
            </tr>
            <tr>
                <td>Pastor-Niemöller-Platz 2, 13156 Berlin.</td>
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

        @if($employee->role!=="admin" )
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
