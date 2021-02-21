@extends('layouts.admin.base')
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
        <form action="{{route('service_details_update',$service_request->id)}}" method="POST">
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

                    @if($service_request->categorie=="Transport")
                        <tr>
                            <td>PickOff Address</td>
                        </tr>

                    <tr class="table-warning">
                        <td>Customer Address</td>
                        <td>
                            {{$service_request->pickoff->house_number}}
                            {{$service_request->pickoff->street}}<br>
                            {{$service_request->pickoff->city}}
                            {{$service_request->pickoff->post_code}}
                        </td>
                    </tr>
                    <tr class="table-warning">
                        <td>Notes</td>
                        <td>{{$service_request->pickoff->notes}}</td>
                    </tr>
                    @endif
                    @if($service_request->categorie=="Transport")
                        <tr>
                            <td>PickUp Address</td>
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
                        @else
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
                    @endif


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
                            <td>

                                <input  class="html-duration-picker" data-hide-seconds  name="duration"
                                       value="{{$service_request->duration}}"  step="5" style="width:100px"> Hours

                            </td>
                        </tr>
                    @elseif($service_request->categorie=="Construction")
                        <tr class="table-info">
                            <td>Service Duration</td>
                            <td><input type="number" value="{{$service_request->SPM}}" name="square_meter"> Square meter
                            </td>
                        </tr>
                    @elseif($service_request->categorie=="Transport")

                        @if($service_request->hourly)
                            <tr class="table-info">
                                <td>Service Duration</td>
                                <td>
                                    <input  class="html-duration-picker" data-hide-seconds  name="duration"
                                            value="{{$service_request->duration}}"  step="5" style="width:100px"> Hours

                                </td>
                            </tr>
                            @else
                            <tr class="table-info">
                                <td>Distance</td>
                                <td>
                                    <input name="distance" id="distance" value="{{$service_request->distance}}"   style="width:100px">
                                </td>
                            </tr>

                            <tr class="table-info">
                                <td>Stopover Charge</td>
                                <td>
                                    <input    name="stopover" style="width:100px">
                                </td>
                            </tr>
                            <tr class="table-info">
                                <td>Waiting Time </td>
                                <td>
                                    <input  class="html-duration-picker" data-hide-seconds  name="waiting" style="width:100px"> Hours
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

                    <tr class="table-primary">
                        <td>Select Employee</td>
                        <td>
                            <select name="employee"  class="form-control select2" id="employee">
                                <option value="">Select Employee</option>
                            @foreach($all_employee as $employee)
                                    <option value="{{$employee->id}}">{{$employee->name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr class="table-primary">
                        <td>Employee Name</td>
                        <td>{{$service_request->employee->name ?? "N/A" }}</td>
                    </tr>

                    <tr class="table-warning">
                        <td>Employee Phone</td>
                        <td>{{$service_request->employee->phone ?? "N/A"}} </td>
                    </tr>


                    </tbody>
                </table>
            </div>

            <div class="m-auto text-center">
                <button class="btn btn-info mb-5 " type="submit">update</button>
            </div>
        </form>
    </div> <br><br>




    <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
    <br>


@endsection
@section('js')
    <script>


        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>


@endsection
