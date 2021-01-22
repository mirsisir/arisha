@extends('layouts.admin.base')

@section('title', 'Employee List')

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-responsive">
                <thead>
                <tr class="badge-info">
                    <td>Name</td>
                    <td>Phone</td>
                    <td>Gender</td>
                    <td>Email</td>
                    <td>City</td>
                    <td>Address</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach($all_employee as $employee)
                <tr>
                    <th>{{$employee->fname}}  {{$employee->lname}}</th>
                    <th>{{$employee->mobile}}</th>
                    <th>{{$employee->gender}}</th>
                    <th>{{$employee->email}}</th>
                    <th>{{$employee->city}}</th>
                    <th>{{$employee->address}}</th>
                    <th><a class=" btn btn-success" href="{{route('partner_request_accept',$employee->id)}}">Accept</a></th>
                </tr>
                    @endforeach


                </tbody>
            </table>

        </div>
    </div>



@endsection
