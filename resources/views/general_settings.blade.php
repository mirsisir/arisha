@extends('layouts.admin.base')
@section('content')

    @php($settings = \App\Models\GeneralSettings::take(1)->first())

    <div class="card w-75 m-auto">
        <div class="card-body">
            <form action="{{route('general_settings_save')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <label for="">Company Name</label>
            <input type="text" value="{{$settings->name ?? " "}}" class="form-control" name="name">

               <label for="">Company Phone</label>
            <input type="number" value="{{$settings->phone ?? " "}}" class="form-control" name="phone">
               <label for="">Company Email</label>
            <input type="text" value="{{$settings->email ?? ""}}"  class="form-control" name="email">
            <br>
            <p>Company Address</p>
               <label for="">street</label>
            <input type="text" class="form-control"  value="{{$settings->street ?? " "}}" name="street">
               <label for="">House Number</label>
            <input type="text" class="form-control" name="house_number" value="{{$settings->house_number ?? " "}}">
               <label for="">Post Code</label>
            <input type="text" class="form-control" name="post_code" value="{{$settings->post_code ?? " "}}" >
                  <label for="">City</label>
            <input type="text" class="form-control" name="city" value="{{$settings->city ?? " "}}">
                  <label for="">UST-No</label>
            <input type="text" class="form-control" name="ust" value="{{$settings->ust ?? " "}}">
                  <label for="">HRB</label>
            <input type="text" class="form-control" name="hrb" value="{{$settings->hrb ?? " "}}">
            <br>
            <label for="">Logo</label><br>
             <input type="file" name="logo" id="logo">
                <br>
                <br>
                <input type="submit" value="Save" class="btn btn-success btn-lg float-right">
            </form>
        </div>
    </div>

@endsection
