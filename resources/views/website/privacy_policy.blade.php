@extends('layouts.web.web_base')
@section('content')

    <div class="content"><h2 class="">{{$policy->translation()->title}}</h2></div>
    <hr>

    <div id="content-wrap" class="container clr">

        {!! $policy->translation()->details !!}


    </div>
    <br><br>

@endsection
