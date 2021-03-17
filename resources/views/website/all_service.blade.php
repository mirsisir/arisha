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
            background-color: #fff9c2;
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
            background-color: #fff5eb;
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
            color: #fff5eb;
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
            background-color: skyblue;
            color: black;
            margin-top: -15px;
            margin-bottom: +20px;
            transition: 0.3s ease;
        }
    </style>
    <br>
    <br>

    <div class="container">

        <div id="construction"><br><br></div>

        <div class=" p-1 m-1 text-center" style="background-color: green ; color: #fff5eb ; border-radius: 10px">
            <h3>Construction</h3>
        </div>
        <br>

        <div class="tab-content wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <div role="tabpanel" class="tab-pane fade show active" id="yearly">
                <div class="row justify-content-center" style="grid-auto-flow: column;">

                    @foreach($construction as $service)

                        <div class="col-md-6 col-lg-4 mb-30">
                            <div class="price-item text-center border p-1" style="height:100%; ">
                                <div class="btn-success" style="border-bottom:2px solid green ; border-radius: 15px ">
                                    <h4>{{__($service->name)}}</h4>

                                    @if($service->category == "Cleaning")
                                        <h2 class="mb-0"><sup>€</sup>{{$service->charge}}</h2>Per Hour <br>

                                        <hr>
                                    @elseif($service->category == "Construction")
                                        <h2 class="mb-0"><sup>€</sup>{{$service->SPM}}</h2>Square meter<br>
                                        <hr>

                                    @elseif($service->category == "Transport")
                                        @if(!$service->hourly==true)
                                            <h2 class="mb-0"><sup>€</sup>{{$service->basic_price}}</h2>Basic price<br>
                                            <hr>

                                        @else
                                            <h2 class="mb-0"><sup>€</sup>{{$service->charge}}</h2>Per Hour <br>
                                            <hr>

                                        @endif

                                    @endif
                                    <span class="text-capitalize badge badge-info">{{$service->category}}</span>
                                    <br>
                                    <br>

                                </div>


                                <div class="price-content ">
                                    <br>
                                    <table class="table border table-danger">
                                        @if($service->category == "Cleaning")
                                            <tr><strong>{{__('Charge Per Hour')}} : </strong> <p>{{$service->charge}}</p></tr>
                                            <hr>


                                        @elseif($service->category == "Construction")
                                            <tr><strong>{{__('Charge Square meter')}} : </strong> <p>{{$service->SPM}}</p></tr>
                                            <hr>

                                        @elseif($service->category == "Transport")
                                            @if(!$service->hourly==true)
                                                <tr><strong>{{__('Basic price')}} : </strong> <p>{{$service->basic_price}}</p></tr>
                                            <hr>
                                                <tr> <strong>{{__('Each kilometre')}} : </strong> <p>{{$service->km_price}}</p></tr>
                                            <hr>
                                                <tr><strong>{{__('Stopover')}} : </strong> <p>{{$service->stop_over_price}}</p></tr>
                                            <hr>
                                                <tr><strong>{{__('Waiting included every 5 min')}} : </strong></tr>
                                            <hr>
                                                <tr><p>{{$service->waiting_price}}</p></tr>
                                            <hr>

                                                <tr><strong>{{__('Helper')}} : </strong> <p>{{$service->helpers}}</p></tr>
                                                <hr>



                                            @else
                                                <tr><strong>{{__('Charge Per Hour')}} : </strong> <p>{{$service->charge}}</p></tr>
                                                <hr>

                                            @endif

                                        @endif
                                        <tr><p>{{$service->details}}</p></tr>
                                        <hr>




                                    </table>

                                </div>

                                @if (Auth::check())
                                    <a href="{{route('services_request',['language'=>app()->getLocale(),'id'=>$service->id])}}">
                                        <button class="btn btn-success align-self-end ">{{__('BOOK NOW')}}</button>
                                    </a>
                                @else

                                    <button class="btn btn-success" data-toggle="modal" data-target="#modal-success">{{__('BOOK NOW')}}</button>

                                @endif






                                <br>

                                <br>
                            </div>

                        </div>

                    @endforeach
                </div>
            </div>
        </div>

        <div id="transport"><br>.<br><br><br></div>
        <div class=" p-1 m-1 text-center"  style="background-color: green ; color: #fff5eb ; border-radius: 10px">
            <h3>Transport</h3>
        </div>
        <br>
        <div class="tab-content wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <div role="tabpanel" class="tab-pane fade show active" id="yearly">
                <div class="row justify-content-center" style="grid-auto-flow: column;">

                    @foreach($transport as $service)

                        <div class="col-md-6 col-lg-4 mb-30">
                            <div class="price-item text-center border p-1" style="height:100%; ">
                                <div class="btn-success" style="border-bottom:2px solid green ; border-radius: 15px ">
                                    <h4>{{__($service->name)}}</h4>

                                    @if($service->category == "Cleaning")
                                        <h2 class="mb-0"><sup>€</sup>{{$service->charge}}</h2>Per Hour <br>

                                        <hr>
                                    @elseif($service->category == "Construction")
                                        <h2 class="mb-0"><sup>€</sup>{{$service->SPM}}</h2>Square meter<br>
                                        <hr>

                                    @elseif($service->category == "Transport")
                                        @if(!$service->hourly==true)
                                            <h2 class="mb-0"><sup>€</sup>{{$service->basic_price}}</h2>Basic price<br>
                                            <hr>

                                        @else
                                            <h2 class="mb-0"><sup>€</sup>{{$service->charge}}</h2>Per Hour <br>
                                            <hr>

                                        @endif

                                    @endif
                                    <span class="text-capitalize badge badge-info">{{$service->category}}</span>
                                    <br>
                                    <br>

                                </div>


                                <div class="price-content ">
                                    <br>
                                    <table class="table border table-danger">
                                        @if($service->category == "Cleaning")
                                            <tr><strong>{{__('Charge Per Hour')}} : </strong> <p>{{$service->charge}}</p></tr>
                                            <hr>


                                        @elseif($service->category == "Construction")
                                            <tr><strong>{{__('Charge Square meter')}} : </strong> <p>{{$service->SPM}}</p></tr>
                                            <hr>

                                        @elseif($service->category == "Transport")
                                            @if(!$service->hourly==true)
                                                <tr><strong>{{__('Basic price')}} : </strong> <p>{{$service->basic_price}}</p></tr>
                                            <hr>
                                                <tr> <strong>{{__('Each kilometre')}} : </strong> <p>{{$service->km_price}}</p></tr>
                                            <hr>
                                                <tr><strong>{{__('Stopover')}} : </strong> <p>{{$service->stop_over_price}}</p></tr>
                                            <hr>
                                                <tr><strong>{{__('Waiting included every 5 min')}} : </strong></tr>
                                            <hr>
                                                <tr><p>{{$service->waiting_price}}</p></tr>
                                            <hr>

                                                <tr><strong>{{__('Helper')}} : </strong> <p>{{$service->helpers}}</p></tr>
                                                <hr>



                                            @else
                                                <tr><strong>{{__('Charge Per Hour')}} : </strong> <p>{{$service->charge}}</p></tr>
                                                <hr>

                                            @endif

                                        @endif
                                        <tr><p>{{$service->details}}</p></tr>
                                        <hr>




                                    </table>

                                </div>

                                @if (Auth::check())
                                    <a href="{{route('services_request',['language'=>app()->getLocale(),'id'=>$service->id])}}">
                                        <button class="btn btn-success align-self-end ">{{__('BOOK NOW')}}</button>
                                    </a>
                                @else

                                    <button class="btn btn-success" data-toggle="modal" data-target="#modal-success">{{__('BOOK NOW')}}</button>

                                @endif






                                <br>

                                <br>
                            </div>

                        </div>

                    @endforeach
                </div>
            </div>
        </div>


        <div id="cleaning"><br>.<br><br><br></div>
        <div class=" p-1 m-1 text-center"  style="background-color: green ; color: #fff5eb ; border-radius: 10px">
            <h3>Cleaning</h3>
        </div>
        <br>
        <div class="tab-content wow fadeIn" id="construction" style="visibility: visible; animation-name: fadeIn;">
            <div role="tabpanel" class="tab-pane fade show active" id="yearly">
                <div class="row justify-content-center" style="grid-auto-flow: column;">

                    @foreach($cleaning as $service)

                        <div class="col-md-6 col-lg-4 mb-30">
                            <div class="price-item text-center border p-1" style="height:100%; ">
                                <div class="btn-success" style="border-bottom:2px solid green ; border-radius: 15px ">
                                    <h4>{{__($service->name)}}</h4>

                                    @if($service->category == "Cleaning")
                                        <h2 class="mb-0"><sup>€</sup>{{$service->charge}}</h2>Per Hour <br>

                                        <hr>
                                    @elseif($service->category == "Construction")
                                        <h2 class="mb-0"><sup>€</sup>{{$service->SPM}}</h2>Square meter<br>
                                        <hr>

                                    @elseif($service->category == "Transport")
                                        @if(!$service->hourly==true)
                                            <h2 class="mb-0"><sup>€</sup>{{$service->basic_price}}</h2>Basic price<br>
                                            <hr>

                                        @else
                                            <h2 class="mb-0"><sup>€</sup>{{$service->charge}}</h2>Per Hour <br>
                                            <hr>

                                        @endif

                                    @endif
                                    <span class="text-capitalize badge badge-info">{{$service->category}}</span>
                                    <br>
                                    <br>

                                </div>


                                <div class="price-content ">
                                    <br>
                                    <table class="table border table-danger">
                                        @if($service->category == "Cleaning")
                                            <tr><strong>{{__('Charge Per Hour')}} : </strong> <p>{{$service->charge}}</p></tr>
                                            <hr>


                                        @elseif($service->category == "Construction")
                                            <tr><strong>{{__('Charge Square meter')}} : </strong> <p>{{$service->SPM}}</p></tr>
                                            <hr>

                                        @elseif($service->category == "Transport")
                                            @if(!$service->hourly==true)
                                                <tr><strong>{{__('Basic price')}} : </strong> <p>{{$service->basic_price}}</p></tr>
                                                <hr>
                                                <tr> <strong>{{__('Each kilometre')}} : </strong> <p>{{$service->km_price}}</p></tr>
                                                <hr>
                                                <tr><strong>{{__('Stopover')}} : </strong> <p>{{$service->stop_over_price}}</p></tr>
                                                <hr>
                                                <tr><strong>{{__('Waiting included every 5 min')}} : </strong></tr>
                                                <hr>
                                                <tr><p>{{$service->waiting_price}}</p></tr>
                                                <hr>

                                                <tr><strong>{{__('Helper')}} : </strong> <p>{{$service->helpers}}</p></tr>
                                                <hr>



                                            @else
                                                <tr><strong>{{__('Charge Per Hour')}} : </strong> <p>{{$service->charge}}</p></tr>
                                                <hr>

                                            @endif

                                        @endif
                                        <tr><p>{{$service->details}}</p></tr>
                                        <hr>




                                    </table>

                                </div>

                                @if (Auth::check())
                                    <a href="{{route('services_request',['language'=>app()->getLocale(),'id'=>$service->id])}}">
                                        <button class="btn btn-success align-self-end ">{{__('BOOK NOW')}}</button>
                                    </a>
                                @else

                                    <button class="btn btn-success" data-toggle="modal" data-target="#modal-success">{{__('BOOK NOW')}}</button>

                                @endif






                                <br>

                                <br>
                            </div>

                        </div>

                    @endforeach
                </div>
            </div>
        </div>
        <br>

    </div>


@endsection
