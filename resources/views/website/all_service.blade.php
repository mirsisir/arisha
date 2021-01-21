<!-- Service Section -->
@extends('layouts.web.web_base')
@section('content')
    <section class="padding ptb-xs-40">
        <div class="container">
            <div class="row pb-30 text-center">
                <div class="col-md-12">
                    <div class="section-title_home">
                        <h2>Our <span>Service</span></h2>
                    </div>
                </div>
            </div>

            <div class="row">

                @foreach($all_service as $service)
                    <div class="col-md-6 col-lg-4 mb-30" >
                        <div class="card">
                            <div class="card-body">
                                <div class="service_box border" style="background-color:#bfe9a8;">
                                    <figure>
                                        <img
                                            src="https://thumbs.dreamstime.com/b/architect-foreman-engineering-construction-worker-different-characte-professionals-teamwork-character-vector-illustration-144716718.jpg"
                                            alt=""/>
                                    </figure>
                                    <h3><a href="#" >{{$service->name}}</a></h3>
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
                                    <button class="btn btn-outline-info">BOOK NOW</button>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

        </div>
    </section>


@endsection
