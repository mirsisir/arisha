@extends('layouts.web.web_base')
@section('content')

    <style>
        body {font-family: Arial;}

        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #479c18;
            color: white;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #337011;
            color: white;
        }

        /* Style the tab content */
        label {
            color: white;
             tab-size:bold;
        }
    </style>

<div class="card"><br>
    <div class="container">
        <h2 class="d-inline" ><a href="{{route('customer_dashboard',app()->getLocale())}}">Dashboard</a></h2>
        <p class="float-right lead text-success btn"> <a class="btn btn-success" href="{{route('customer_profile',app()->getLocale())}}">Profile</a></p>
    </div>
    @if(Session::has('message'))
        <p class="alert alert-success text-center">{{ Session::get('message') }}</p>
    @endif
    <div class="card-body col-sm-12">
        <form action="{{route('customer_profile_update',app()->getLocale())}}" method="POST" class="w-75 m-auto border p-5 col-sm-9" style="background-color:#479c18; color: white" >
            @csrf
            <div class="row ">

                <div class="col-lg-6">
                    <label for="name">Name</label>
                    <input class="form-control" type="text"  name="name" value="{{$user->name}}">
                </div>
                <div class="col-lg-6">
                    <label for="male">Email</label>
                    <input class="form-control" type="text"   name="email" value="{{$user->email}}">
                </div
                >
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <label for="name">Phone</label>
                    <input class="form-control" type="text" value="{{$user->phone}}" name="phone" disabled>
                </div>

            </div>
            <p>Address</p>
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <label for="name">Street</label>
                    <input class="form-control" type="text" value="{{$user->street}}" name="street">
                </div>
                <div class="col-lg-6">
                    <label for="male">House Number</label>
                    <input class="form-control" type="text"   value="{{$user->house_number}}" name="house_number">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <label for="name">Post Code</label>
                    <input class="form-control" type="text" value="{{$user->post_code}}" name="post_code">
                </div>
                <div class="col-lg-6">
                    <label for="male">City</label>
                    <input class="form-control" type="text"   value="{{$user->city}}" name="city">
                </div>
            </div>
            <input type="submit" value="Update" class="btn btn-outline-light float-right">
            <br>
        </form>




    </div>
    <br>
    <br>
</div>

@endsection



