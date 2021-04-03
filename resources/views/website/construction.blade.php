@extends('layouts.web.web_base')
@section('content')
    <style>
        h3 {
            color: green;
            font-weight: bold;

        }

        .green {
            color: green;
        }

    </style>
    <div class="card ">
        <div class="card-body">

                <div class="container ">
                            <div class="blog-post mb-30 ">
                                <div class="post-header">
                                    <h2>{{$construction->translation()->title ?? "Arisha Service"}}</h2>
                                </div>
                                <div class="post-media">
                                    <img src="{{asset('assets/images/painting.jpg')}}" alt="">

                                    {!! $construction->translation()->details  ?? "Arisha Service" !!}
                                </div>
                            </div>
                </div>
        </div>
    </div>





@endsection
