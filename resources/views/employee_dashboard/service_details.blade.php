@extends('layouts.employee.employee_base')
@section('content')
    <style>
        @media print {
            * {
                display: none;
            }

            #printableTable {
                display: block;
            }
        }
    </style>

    <div class="card  w-75  mt-4 ml-auto mr-auto" id="printableTable">

        <h3 class="text-center mt-2">Service Request Info </h3>
        <form action="{{route('service_details_emp',$service_request->id)}}" method="POST">
            @csrf
            <div class="card-body">
                <table class="table border p-2" id="service_request">
                    <tbody>
                    <tr class="table-primary">
                        <td>Customer Name</td>
                        <td>{{$service_request->customer->name}}</td>
                    </tr>
                    <tr class="table-warning">
                        <td>Customer Phone</td>
                        <td>{{$service_request->customer->phone}}</td>
                    </tr>

                    <tr class="table-warning">
                        <td>Customer Address</td>
                        <td>
                            {{$service_request->house_number}}
                            {{$service_request->street}}<br>
                            {{$service_request->city}}
                            {{$service_request->post_code}}
                        </td>
                    </tr>
                    <tr class="table-warning">
                        <td>Notes</td>
                        <td>{{$service_request->notes}}</td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="table-primary">
                        <td>Service Name</td>
                        <td>{{$service_request->service->name}}</td>
                    </tr>
                    <tr class="table-info">
                        <td>Start Time</td>
                        <td>{{$service_request->start_time}}</td>
                    </tr>
                    <tr class="table-info">
                        <td>Service date</td>
                        <td>{{$service_request->date}}</td>
                    </tr>


                    @if($service_request->categorie=="Cleaning")
                        <tr class="table-info">
                            <td>Service Duration</td>
                            <td><input type="number" min="1" max="12" name="duration"
                                       value="{{$service_request->duration}}" style="width:50px"> Hours
                            </td>
                        </tr>
                    @elseif($service_request->categorie=="Construction")
                        <tr class="table-info">
                            <td>Service Duration</td>
                            <td><input type="number" value="{{$service_request->SPM}}" name="square_meter"> Square meter
                            </td>
                        </tr>
                    @elseif($service_request->categorie=="Transport")
                        @if($service_request->pickoff_addresses_id)
                            <tr class="table-info">
                                <td>Service Duration</td>
                                <td><input type="number" min="1" max="12" name="duration"
                                           value="{{$service_request->duration}}" style="width:50px"> Hours
                                </td>
                            </tr>
                        @endif

                    @endif


                    <tr class="table-info">
                        <td>Service Charge</td>
                        <td>{{$service_request->total_charge}}</td>
                    </tr>
                    <tr class="table-info">
                        <td>Service Payment</td>
                        <td>{{$service_request->payments}}</td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
{{--                    <tr class="table-primary">--}}
{{--                        <td>Employee Name</td>--}}
{{--                        <td>{{$service_request->employee->fname ?? "N/A"}}  {{$service_request->employee->name ?? "N/A"}}</td>--}}
{{--                    </tr>--}}

{{--                    <tr class="table-warning">--}}
{{--                        <td>Employee Phone</td>--}}
{{--                        <td>{{$service_request->employee->mobile ?? "N/A"}} </td>--}}
{{--                    </tr>--}}


                    </tbody>
                </table>
            </div>
            <div class="m-auto text-center">
                <button class="btn btn-info mb-5 " type="submit">Update</button>
            </div>
        </form>
        <a href="" class="btn btn-success">Service Complete</a>
    </div> <br><br>





@endsection
