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
            <section class="padding ptb-xs-40 pt-0">
                <div class="container ">

                            <div class="blog-post mb-30 ">
                                <div class="post-header">
                                    <h2>{{$cleaning->translation()->title ?? "Arisha Service"}}</h2>
                                </div>
                                <div class="post-media"><img src="{{asset('assets/images/blog/img2.jpg')}}" alt="">
                                    {!! $cleaning->translation()->details  ?? "Arisha Service" !!}
                                </div>


                    </div>
                    <hr>

                </div>
            </section>


        </div>
    </div>
@endsection
