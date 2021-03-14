@extends('layouts.admin.base')

@section('title', 'Employee Details')

@section('content')

<div class="row text-dark">
    <div class="col-md-12">

        <div class="d-flex">
            <div class="card text-center mr-4" style="width: 18rem;">
                <img class="card-img-top" height="250px" src="/storage/{{$employee->photo}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$employee->fname}} {{ $employee->lname}}</h5>
                    <h6 class="card-subtitle mb-2">{{ $employee->employee_id}}</h6>
{{--                <p class="card-text">{{ $employee->department->department ?? " N/A" }} - {{ $employee->designation->name ?? " N/A"}}</p>--}}
                </div>
            </div>

            <div class="card w-75">
                <div class="card-header">
                  Personal Details
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td>{{$employee->fname}}{{ $employee->lname}}</td>
                        </tr>
{{--                        <tr>--}}
{{--                            <th>Father's Name</th>--}}
{{--                            <td>{{$employee->father}}</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>Date of Birth</th>--}}
{{--                            <td>{{$employee->dob}}</td>--}}
{{--                        </tr>--}}
                        <tr>
                            <th>Gender</th>
                            <td>{{$employee->gender}}</td>
                        </tr>
{{--                        <tr>--}}
{{--                            <th>Mobile</th>--}}
{{--                            <td>{{$employee->mobile}}</td>--}}
{{--                        </tr>--}}
                        <tr>
                            <th>NID</th>
                            <td>{{$employee->nid}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{$employee->phone}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$employee->email}}</td>
                        </tr>
                        <tr>
                            <th>Address </th>
                            <td>{{$employee->address}}  {{$employee->street}} <br> {{$employee->city}} {{$employee->post_code}}  </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex mt-4">
            <div class="card w-100">
                <div class="card-header">
                   Bank Information
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Bank Name</th>
                            <td>{{$employee->bank}}</td>
                        </tr>
{{--                        <tr>--}}
{{--                            <th>Branch Name</th>--}}
{{--                            <td>{{$employee->branch}}</td>--}}
{{--                        </tr>--}}
                        <tr>
                            <th>Account Name</th>
                            <td>{{$employee->acc_name}}</td>
                        </tr>
                        <tr>
                            <th>Account Number</th>
                            <td>{{$employee->acc_number}}</td>
                        </tr>


                    </tbody>
                </table>
            </div>

        </div>
        <div class="card w-100 mt-4">
            <div class="card-header">
               Official Document
            </div>
            <table class="table">
                <tbody>
                    <tr>
                

                    <tr>
                        <th>Card </th>
                        <td>
                            @if($employee->business_licence)
                            <iframe src="/storage/{{ $employee->business_licence }}" frameborder="0" style="width:100%;min-height:200px;"></iframe></td>
                            @endif
                    </tr>
                    <tr>
                        <th>ID Proof</th>
                        <td>
                            @if($employee->id_proff)
                            <iframe src="/storage/{{ $employee->id_proff }}" frameborder="0" style="width:100%;min-height:200px;"></iframe></td>
                            @endif
                    </tr>
                    <tr>
                        <th>Other</th>
                        <td>
                            @if($employee->other)
                            <iframe src="/storage/{{ $employee->other }}" frameborder="0" style="width:100%;min-height:200px;"></iframe></td>
                            @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


</div>


<div class="text-center mt-5"> <a href="{{route('print_user',$employee->id)}}" type="button" class="btn btn-success">Print</a>
</div>

@endsection
