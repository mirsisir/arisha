<!-- Service Section -->
@extends('layouts.web.web_base')
@section('content')
    <style>
        .row {
            grid-auto-flow: column;
        }

        .c {
            border: solid green;
        }
    </style>
    <section class="padding ptb-xs-40">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <div class="section-title_home">
                        <h2>Our <span>Service</span></h2>
                    </div>
                </div>
            </div>

            <div class="row col-sm-9 col-lg-12 m-auto">

                @foreach($all_service as $service)

                        <div class=" c col-md-6 col-lg-4 mb-30 "  style="">
                            <div class="  card ">
                                <div class="card-body ">
                                    <h3 class="p-3 mt-0 text-center" style="background-color:green; color:white;" ><a href="#" style="color:white;" >{{$service->name}}</a></h3>

                                    <div class=" p-4 ">
                                        <p class="badge badge-pill badge-info " >{{$service->category}}</p> <br>

                                        @if($service->category == "Cleaning")
                                            <strong>Charge Per Hour : </strong> <p>{{$service->charge}}</p>

                                        @elseif($service->category == "Construction")
                                            <strong>Charge Square meter : </strong> <p>{{$service->SPM}}</p>

                                        @elseif($service->category == "Transport")
                                            @if(!$service->hourly==true)
                                                <strong>Basic price : </strong> <p>{{$service->basic_price}}</p>
                                                <strong>Each kilometre : </strong> <p>{{$service->km_price}}</p>
                                                <strong>Stopover : </strong> <p>{{$service->stop_over_price}}</p>
                                                <strong>Waiting included Thereafter every 5 min : </strong> <p>{{$service->waiting_price}}</p>
                                                <strong>Helper : </strong> <p>{{$service->helpers}}</p>
                                            @else
                                                <strong>Charge Per Hour : </strong> <p>{{$service->charge}}</p>
                                            @endif

                                        @endif
                                        <hr>
                                        <p>{{$service->details}}</p>
                                    </div>

                                </div>
                                <button class="btn btn-outline-success float-right align-self-end  ">BOOK NOW</button>
                                <br>

                            </div>

                        </div>


                @endforeach


            </div>


        </div>
    </section>


@endsection
