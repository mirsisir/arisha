@extends('layouts.admin.base')
@section('content')

<div class="card">
    <div class=" card-body  mt-3 p-2">


        @if(count($all_service_request) == 0)

            <h4 class=" text-center btn-danger p-3" style="border-radius: 25px; color:black;">No Service Request
                Available for Today</h4>
            <br>
        @else
            <table class="tableHold display " id="tableHold">
                <thead class="btn-warning" style="color:black">
                <tr>
                    <th> Customer</th>
                    <th> Address</th>
                    <th> Employee</th>
                    <th> Date</th>
                    <th> Duration</th>
                    <th> Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($all_service_request as $request)
                    <tr>
                        <td>{{$request->customer->name}} <br>
                            {{$request->customer->phone}}
                        </td>
                        <td>
                            {{$request->house_number}}<br>
                            {{$request->street}}<br>
                            {{$request->city}} <br>
                            {{$request->post_code}}

                        </td>
                        <td>{{$request->employee->fname ?? "N/A"}}</td>
                        <td>
                            {{$request->date}} <br>
                            Time : : {{$request->start_time}}
                        </td>
                        <td>
                            @if($request->categorie == "Construction")
                                {{$request->SPM}} Square meter
                            @elseif($request->categorie == "Cleaning")
                                {{$request->duration}}
                            @else
                            @endif

                        </td>
                        <td>
                            <a href="{{route('service_details',$request->id)}}" class="btn btn-info"> <i class="mdi mdi-eye"></i> </a>

                            <a class="btn btn-success" href="{{route('confirm_hold_request',$request->id)}}"><i class="mdi mdi-checkbox-marked-circle-outline"></i> </a>

                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#exampleModal{{$request->id}}"> <i class="mdi mdi-close"></i>
                            </button>
                            <div class="modal fade" id="exampleModal{{$request->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">

                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <button type="button" class="close float-right" data-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>

                                        <div class="modal-body pb-1">
                                            <H3 class="text-center">Are you sure you want to reject ? </H3>
                                            <br>
                                        </div>

                                        <a class="btn btn-success" href="{{route('reject_request',$request->id)}}">Confirm </a>

                                    </div>
                                </div>
                            </div>

                        </td>


                    </tr>
                @endforeach

                </tbody>
            </table>

        @endif
    </div>

</div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#tableHold').DataTable();
        });
    </script>
@endsection
