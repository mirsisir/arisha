<!-- Service Section -->
@extends('layouts.web.web_base')
@section('content')

    <br>
    <br>

    <style>

        @media (min-width: 768px) {
            .price-tabs {
                margin-bottom: 60px;
            }
        }

        .price-item {
            background-color: #fff;
            -webkit-box-shadow: 0 5px 30px 0 rgba(39, 39, 39, 0.15);
            box-shadow: 0 5px 30px 0 rgba(39, 39, 39, 0.15);
            border-radius: 10px;
        }

        .price-item .price-top {
            -webkit-box-shadow: 0 5px 30px 0 rgba(39, 39, 39, 0.15);
            box-shadow: 0 5px 30px 5px rgba(39, 39, 39, 0.15);
            padding: 50px 0 25px;
            background-color: #479c18;
            border-radius: 10px;
            position: relative;
            z-index: 0;
            margin-bottom: 33px;
        }


        .card{
            margin-bottom: 25px;
        }

        .price-item:hover {
            background-color: skyblue;
            color: black;
            margin-top: -3px;
            margin-bottom:3px;
            transition: 0.3s ease;
        }
    </style>

    <div class="container">

        <div id="construction"><br><br></div>

        <div class=" p-1 m-1 text-center" style="background-color: green ; color: #fff5eb ; border-radius: 10px">
            <h3>Handwerker</h3>
        </div>
        <br>

        <div class="tab-content wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <div role="tabpanel" class="tab-pane fade show active" id="yearly">
                <div class="row justify-content-center" style="grid-auto-flow: column;">

                    @foreach($construction as $service)

                        <div class="col-md-6 col-lg-4 card justify-center ">
                            <div class="btn-success text-center" style="border-radius: 20px  20px 0 0"  >
                                <h4>{{__($service->name)}}</h4>

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
                            </div>

                            <div class="price-item text-center border p-3" style="height:100%; border-radius: 0 0 20px 20px">


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

                                                <tr><p>{{$service->waiting_price}}</p></tr>
                                                <hr>

                                                <tr><strong>{{__('Helper')}} : </strong> <p>{{$service->helpers}}</p></tr>
                                                <hr>



                                            @else
                                                <tr><strong>{{__('Charge Per Hour')}} : </strong> <p>{{$service->charge}}</p></tr>
                                                <hr>

                                            @endif

                                        @endif


                                        <tr class="justify-center">
                                            @php
                                                $details = str_replace("\n",",<br>",$service->details);
                                                 echo str_replace("\n",",<br>",$service->details)
                                            @endphp

                                        </tr>
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
                                <p>{{__('Alle Preise sind ohne Mehrwertsteuer')}}</p>

                            </div>

                        </div>

                    @endforeach
                </div>
            </div>
        </div>

        <div id="transport"><br>.<br><br><br></div>
        <div class=" p-1 m-1 text-center"  style="background-color: green ; color: #fff5eb ; border-radius: 10px">
            <h3>Umzug & Transport</h3>
        </div>
        <br>
        <div class="tab-content wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <div role="tabpanel" class="tab-pane fade show active" id="yearly">
                <div class="row justify-content-center" style="grid-auto-flow: column;">

                    @foreach($transport as $service)

                        <div class="col-md-6 col-lg-4 card justify-center ">
                            <div class="btn-success text-center" style="border-radius: 20px  20px 0 0"  >
                                <h4>{{__($service->name)}}</h4>

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


                            </div>

                            <div class="price-item text-center border p-3" style="height:100%; border-radius: 0 0 20px 20px">


                                <div class="price-content ">

                                    <table class="table border table-danger">
                                        @if($service->category == "Cleaning")
                                            <tr><strong>{{__('Charge Per Hour')}} : </strong> <p>{{$service->charge}}</p></tr>


                                        @elseif($service->category == "Construction")
                                            <tr><strong>{{__('Charge Square meter')}} : </strong> <p>{{$service->SPM}}</p></tr>


                                        @elseif($service->category == "Transport")
                                            @if(!$service->hourly==true)
                                                <tr><strong>{{__('Basic price')}} : </strong> <p>{{$service->basic_price}}</p></tr>

                                                <tr> <strong>{{__('Each kilometre')}} : </strong> <p>{{$service->km_price}}</p></tr>

                                                <tr><strong>{{__('Stopover')}} : </strong> <p>{{$service->stop_over_price}}</p></tr>

                                                <tr><strong>{{__('Waiting included every 5 min')}} : </strong></tr>

                                                <tr><p>{{$service->waiting_price}}</p></tr>


                                                <tr><strong>{{__('Helper')}} : </strong> <p>{{$service->helpers}}</p></tr>




                                            @else
                                                <tr><strong>{{__('Charge Per Hour')}} : </strong> <p>{{$service->charge}}</p></tr>


                                            @endif

                                        @endif
                                            <tr class="justify-center">
                                                @php
                                                    $details = str_replace("\n",",<br>",$service->details);
                                                     echo str_replace("\n",",<br>",$service->details)
                                                @endphp

                                            </tr>

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
                                <p>{{__('Alle Preise sind ohne Mehrwertsteuer')}}</p>

                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>


        <div id="cleaning"><br>.<br><br><br></div>
        <div class=" p-1 m-1 text-center"  style="background-color: green ; color: #fff5eb ; border-radius: 10px">
            <h3>Reinigung Services</h3>
        </div>
        <br>
        <div class="tab-content wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <div role="tabpanel" class="tab-pane fade show active" id="yearly">
                <div class="row justify-content-center" style="grid-auto-flow: column;">

                    @foreach($cleaning as $service)

                        <div class="col-md-6 col-lg-4  card justify-center ">
                            <div class="btn-success text-center" style="border-radius: 20px  20px 0 0"  >
                                <h4>{{__($service->name)}}</h4>

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


                            </div>

                            <div class="price-item text-center border p-3" style="height:100%; border-radius: 0 0 20px 20px">


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


                                                <tr><strong>{{__('Helper')}} : </strong> <p>{{$service->helpers}}</p></tr>
                                                <hr>



                                            @else
                                                <tr><strong>{{__('Charge Per Hour')}} : </strong> <p>{{$service->charge}}</p></tr>
                                                <hr>

                                            @endif

                                        @endif
                                            <tr class="justify-center">
                                                @php
                                                    $details = str_replace("\n",",<br>",$service->details);
                                                     echo str_replace("\n",",<br>",$service->details)
                                                @endphp
                                            </tr>
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
