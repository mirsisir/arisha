@extends('layouts.employee.employee_base')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="bill" id="bill">
                <thead>
                <tr>
                    <td>Voucher-NO</td>
                    <td>Service Name</td>
                    <td>Service Date</td>
                    <td>Service Duration</td>
                    <td>Service Charge</td>
                    <td>Bill</td>
                </tr>
                </thead>
                <tbody>
                @foreach($service_request as $service)
                    <tr>
                        <td>DE-{{$service->id}}</td>
                        <td>{{$service->service->name}}</td>
                        <td>{{$service->date}}</td>

                        @if ($service->categorie=="Construction")
                            <td>{{$service->SPM}} Sqm</td>

                        @elseif ($service->categorie=="Transport")
                            @if ($service->hourly=0)
                                <td>{{$service->duration}} H</td>
                            @else
                                <td>{{$service->distance}} KM</td>
                            @endif

                        @elseif ($service->categorie=="Cleaning")
                            <td>{{$service->duration}} H</td>
                        @endif

                        @php($time = explode(':', $service->duration))
                        @php($time = ($time[0]*60) + ($time[1]))

                        <td>{{$service->net_charge}} <i class="mdi mdi-currency-eur"></i></td>

                        @if ($service->categorie=="Construction")
                            <td>{{$service->SPM*$service->service->employee_charge}} <i class="mdi mdi-currency-eur"></i></td>

                        @elseif ($service->categorie=="Transport")
                            @if ($service->hourly=0)
                                <td>{{$time * ($service->service->employee_charge/60)}} <i class="mdi mdi-currency-eur"></i></td>
                            @else
                                <td>{{round(($service->service->employee_charge*$service->net_charge)/100,2)}} <i class="mdi mdi-currency-eur"></i></td>
                            @endif

                        @elseif ($service->categorie=="Cleaning")
                            <td>{{$time * ($service->service->employee_charge/60)}} <i class="mdi mdi-currency-eur"></i></td>
                        @endif

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $(bill).DataTable();
        });
    </script>
@endsection

