@extends('layouts.web.web_base')
@section('content')
    <div class="content">
        <main id="main" class="site-main clr" role="main">
            @if(!empty($terms))
            <div class="content"><h2 class="">{{$terms->translation()->title ?? ""}}</h2></div>
            <div id="content-wrap" class="container clr">


                {!! $terms->translation()->details ?? " "  !!}

            </div><!-- #content-wrap -->
            @endif

                <br>
                <br>
                <br>
                <br>
        </main>
    </div>
@endsection
