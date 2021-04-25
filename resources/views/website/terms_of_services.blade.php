@extends('layouts.web.web_base')
@section('content')

    @if(!empty($terms))
    <div class="content"><h2 class="">{{$terms->translation()->title ?? "Arisha Service"}}</h2></div>
    <hr>

    <div class="content m-4">

       {!! $terms->translation()->details  ?? "Arisha Service" !!}

    </div>
    @endif

    <br>
    <br>
    <br>

@endsection
