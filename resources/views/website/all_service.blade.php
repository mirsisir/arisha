<!-- Service Section -->
@extends('layouts.web.web_base')
@section('content')
    <style>


        @media (min-width: 768px) {
            .price-tabs {
                margin-bottom: 60px;
            }
        }

        .price-tabs .nav-link {
            color: #00b5ec;
            font-weight: 500;
            font-family: "Montserrat", sans-serif;
            font-size: 16px;
            padding: 12px 35px;
            display: inline-block;
            text-transform: capitalize;
            border-radius: 40px;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        @media (min-width: 768px) {
            .price-tabs .nav-link {
                padding: 12px 40px;
            }
        }

        .price-tabs .nav-link.active {
            background-color: #00b5ec;
            color: #fff;
        }

        .price-item {
            background-color: #fff;
            -webkit-box-shadow: 0 5px 30px 0 rgba(39, 39, 39, 0.15);
            box-shadow: 0 5px 30px 0 rgba(39, 39, 39, 0.15);
            border-radius: 10px;
        }

        @media (min-width: 768px) {
            .price-item {
                margin: 0 20px;
                padding-top: 20px;
            }
        }

        .price-item .price-top {
            -webkit-box-shadow: 0 5px 30px 0 rgba(39, 39, 39, 0.15);
            box-shadow: 0 5px 30px 0 rgba(39, 39, 39, 0.15);
            padding: 50px 0 25px;
            background-color: #479c18;
            border-radius: 10px;
            position: relative;
            z-index: 0;
            margin-bottom: 33px;
        }

        @media (min-width: 768px) {
            .price-item .price-top {
                margin: 0 -20px;
                border-radius: 20px;
            }
        }

        .price-item .price-top:after {
            height: 50px;
            width: 100%;
            border-radius: 0 0 10px 10px;
            background-color: #479c18;
            position: absolute;
            content: '';
            left: 0;
            bottom: -17px;
            z-index: -1;
            -webkit-transform: skewY(5deg);
            transform: skewY(5deg);
            -webkit-box-shadow: 0 5px 10px 0 rgba(113, 113, 113, 0.15);
            box-shadow: 0 5px 10px 0 rgba(113, 113, 113, 0.15);
        }

        @media (min-width: 768px) {
            .price-item .price-top:after {
                border-radius: 0 0 20px 20px;
            }
        }

        .price-item .price-top * {
            color: #fff;
        }

        .price-item .price-top h2 {
            font-weight: 700;
        }

        .price-item .price-top h2 sup {
            top: 13px;
            left: -5px;
            font-size: 0.35em;
            font-weight: 500;
            vertical-align: top;
        }

        .price-item .price-content {
            padding: 30px;
            padding-bottom: 40px;
        }

        .price-item .price-content li {
            position: relative;
            margin-bottom: 15px;
            margin-left: 10px;
            margin-right: 10px;
            text-align: center;
        }

        @media (min-width: 992px) {
            .price-item .price-content li {
                padding-left: 28px;
                text-align: left;
            }
        }

        @media (min-width: 992px) {
            .price-item .price-content li i {
                position: absolute;
                left: 0;
                top: 3px;
            }
        }

        .price-item .price-content .zmdi-check {
            color: #28a745;
        }

        .price-item .price-content .zmdi-close {
            color: #f00;
        }

        .popular {
            background-color: #00b5ec;
        }

        .popular .price-top {
            background-color: #fff;
        }

        .popular .price-top:after {
            background-color: #fff;
        }

        .popular .price-top h4 {
            color: #101f41;
        }

        .popular .price-top h2, .popular .price-top span, .popular .price-top sup {
            color: #00b5ec;
        }

        .popular .price-content ul *,
        .popular .price-content ul .zmdi-close, .popular .price-content ul .zmdi-check {
            color: #fff !important;
        }

        .price-item:hover {
            background-color: #7ccb50;
            color: black;
            margin-top: -15px;
            transition: 0.3s ease;
        }
    </style>
    <br>
    <br>
    <div class="container">

        <div class="tab-content wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <div role="tabpanel" class="tab-pane fade show active" id="yearly">
                <div class="row justify-content-center" style="grid-auto-flow: column;">

                    @foreach($all_service as $service)

                        <div class="col-md-6 col-lg-4 mb-30">
                            <div class="price-item text-center border p-1" style="height:100%; border:solid green">
                                <div class="price-top">
                                    <h4>{{$service->name}}</h4>

                                    @if($service->category == "Cleaning")
                                        <h2 class="mb-0"><sup>€</sup>{{$service->charge}}</h2>Per Hour <br>


                                    @elseif($service->category == "Construction")
                                        <h2 class="mb-0"><sup>€</sup>{{$service->SPM}}</h2>Square meter<br>

                                    @elseif($service->category == "Transport")
                                        @if(!$service->hourly==true)
                                            <h2 class="mb-0"><sup>€</sup>{{$service->basic_price}}</h2>Basic price<br>

                                        @else
                                            <h2 class="mb-0"><sup>€</sup>{{$service->charge}}</h2>Per Hour <br>

                                        @endif

                                    @endif
                                    <span class="text-capitalize badge badge-info">{{$service->category}}</span>
                                </div>
                                <div class="price-content ">
                                    <br>
                                    @if($service->category == "Cleaning")
                                        <strong>Charge Per Hour : </strong> <p>{{$service->charge}}</p>

                                    @elseif($service->category == "Construction")
                                        <strong>Charge Square meter : </strong> <p>{{$service->SPM}}</p>

                                    @elseif($service->category == "Transport")
                                        @if(!$service->hourly==true)
                                            <strong>Basic price : </strong> <p>{{$service->basic_price}}</p>
                                            <strong>Each kilometre : </strong> <p>{{$service->km_price}}</p>
                                            <strong>Stopover : </strong> <p>{{$service->stop_over_price}}</p>
                                            <strong>Waiting included every 5 min : </strong>
                                            <p>{{$service->waiting_price}}</p>
                                            <strong>Helper : </strong> <p>{{$service->helpers}}</p>
                                        @else
                                            <strong>Charge Per Hour : </strong> <p>{{$service->charge}}</p>
                                        @endif

                                    @endif
                                    <p>{{$service->details}}</p>


                                </div>

                                @if (Auth::check())
                                    <a href="{{route('services_request',['language'=>app()->getLocale(),'id'=>$service->id])}}">
                                        <button class="btn btn-success float-right align-self-end ">BOOK NOW</button>
                                    </a>
                                @else

                                    <button class="btn btn-success" data-toggle="modal" data-target="#modal-success">BOOK NOW</button>

                                @endif






                                <br>

                                <br>
                            </div>

                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>


@endsection
