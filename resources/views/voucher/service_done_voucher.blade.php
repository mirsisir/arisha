@extends('layouts.admin.base')
@section('content')

    @php($settings = \App\Models\GeneralSettings::take(1)->first())
    <div class="card border mt-3 p-5" id="printSection">
        <div class="text-center">
            <img
                src="{{asset('storage/'. ($settings->logo ?? " ") )  }}"
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


                </table>
            </div>

            <div class="col-lg-5 col-sm-5">
                <table class=" table-responsive table-sm float-right">
                    <tr>
                        <td class="bold">TO</td>
                        <td>{{$service_request->customer->name}}</td>
                    </tr>

                    <tr>
                        <td class="bold">Address</td>
                        <td>{{$service_request->customer->street}} {{$service_request->customer->house_number}}<br>
                            {{$service_request->customer->post_code}} {{$service_request->customer->city}}
                        </td>
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
