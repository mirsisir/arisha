@extends('layouts.employee.employee_base')
@section('content')

<div class=" m-5 border mt-3 p-2">


    @if(count($all_service_request) == 0)
        <br>
        <br>
        <h4 class=" text-center btn-danger p-3" style="border-radius: 25px; color:black;">No Service Request
            Available</h4>
        <br>
    @else
        <table class="table ">
            <thead class="btn-info">
            <tr>
                <th> Customer</th>
                <th> Service Name</th>
                <th> Address</th>
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
                    <td>{{$request->service->name}}</td>
                    <td>
                        {{$request->house_number}}
                        {{$request->street}}<br>
                        {{$request->city}}
                        {{$request->post_code}}

                    </td>

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
                        <a href="{{route('service_details_emp',$request->id)}}" class="btn btn-info"> Details </a>

                    </td>


                </tr>
            @endforeach

            </tbody>
        </table>

    @endif
</div>
@endsection
