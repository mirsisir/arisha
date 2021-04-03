@extends('layouts.web.web_base')
@section('content')

    @if(!empty($arisah))
    <div class="content"><h2 class="">{{$policy->translation()->title}}</h2></div>
    <hr>

    <div id="content-wrap" class="container clr">

        {!! $policy->translation()->details !!}


    </div>
    @endif
    <br><br>
    <br><br>

@endsection
