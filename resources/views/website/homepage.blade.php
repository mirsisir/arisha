@extends('layouts.web.web_base')
@section('content')
    <!-- END HEADER -->

    <!--  Main Banner Start Here-->
    <div class="main-banner banner_up">

        <div id="rev_slider_34_1_wrapper" class="rev_slider_wrapper" data-alias="news-gallery34">
            <!-- START REVOLUTION SLIDER 5.0.7 fullwidth mode -->
            <div id="rev_slider_34_1" class="rev_slider" data-version="5.0.7">
                <ul>
                    <!-- SLIDE  -->
                    <li data-index="rs-129">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('assets/images/banner/slider1.jpg')}}" alt="" class="rev-slidebg">
                        <!-- LAYERS -->
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption Newspaper-Title tp-resizeme "
                             id="slide-129-layer-1"
                             data-x="['left','left','left','left']" data-hoffset="['100','50','50','30']"
                             data-y="['top','top','top','center']" data-voffset="['230','135','50','0']"
                             data-fontsize="['50','50','50','30']"
                             data-lineheight="['55','55','55','35']"
                             data-width="['700','700','700','420']"
                             data-height="none"
                             data-whitespace="normal"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                             data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
                             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                             data-mask_out="x:0;y:0;s:inherit;e:inherit;"
                             data-start="1000"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on">
                            <div class="banner-text">
                                <span class="sub-text">we are here to help you</span>
                                <h2>The best cleaning company in Berlin</h2>
                                <p>
                                    Professionel Reinigung & Handwerker Services in Berlin

                                </p>
                            </div>
                        </div>
                    </li>
                    <!-- SLIDE  -->
                    <li data-index="rs-130" data-title="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('assets/images/banner/slider2.jpg')}}" alt="" class="rev-slidebg">
                        <!-- LAYERS -->
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption Newspaper-Title   tp-resizeme "
                             id="slide-130-layer-1"
                             data-x="['left','left','left','left']" data-hoffset="['100','50','50','30']"
                             data-y="['top','top','top','center']" data-voffset="['230','135','50','0']"
                             data-fontsize="['50','50','50','30']"
                             data-lineheight="['55','55','55','35']"
                             data-width="['700','700','700','420']"
                             data-height="none"
                             data-whitespace="normal"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                             data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
                             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                             data-mask_out="x:0;y:0;s:inherit;e:inherit;"
                             data-start="1000"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on">
                            <div class="banner-text">
                                <span class="sub-text">we are here to help you</span>
                                <h2>Versichert Auftrag , Online Booking , Any time</h2>

                            </div>
                        </div>
                    </li>
                    <!-- SLIDE  -->
                    <li data-index="rs-131">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('assets/images/banner/slider3.jpg')}}" alt="" class="rev-slidebg ">
                        <!-- LAYERS -->
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption Newspaper-Title   tp-resizeme "
                             id="slide-131-layer-1"
                             data-x="['left','left','left','left']" data-hoffset="['100','50','50','30']"
                             data-y="['top','top','top','center']" data-voffset="['230','135','50','0']"
                             data-fontsize="['50','50','50','30']"
                             data-lineheight="['55','55','55','35']"
                             data-width="['700','700','700','420']"
                             data-height="none"
                             data-whitespace="normal"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                             data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
                             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                             data-mask_out="x:0;y:0;s:inherit;e:inherit;"
                             data-start="1000"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on">
                            <div class="banner-text">
                                <span class="sub-text">Jetzt Buchen Einfach und Schnell</span>
                                <h2>Move on Time , Online Booking</h2>

                            </div>
                        </div>
                    </li>
                    <!-- SLIDE  -->
                </ul>
                <div class="tp-bannertimer tp-bottom"></div>
            </div>
        </div>
    </div>


    <section class="latest__block padding ptb-xs-40">

        <div class="container">
            <hr>

            <div class="row text-center mb-40 mb-xs-30">
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="section-title_home">
                                            <h2>{{__('Unsere Leistungen')}}</h2>
                        <span class="b-line"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 border p-1" style="border-color: green;">
                    <div class="img-scale">
                        <figure>
                            <img src="{{asset('assets/images/painting.jpg')}}" alt="" style=" height:250px">
                        </figure>
                        <div class="latest__block-post gray-bg">
                            @if(!empty($construction))
                                <div class="meta-post h-3">
                                    <h3 class="text-success">{{$construction->translation()->title ?? "Arisha Service"}}</h3>
                                </div>


                                <div class="flat-link flat-arrow sm  ">
                                    <a href="{{route('office_cleaning',app()->getLocale())}}">
                                        {!!  Illuminate\Support\Str::limit(($construction->translation()->details ?? " Arisha Service") ,200 )  !!}
                                    </a>
                                    <div class="flat-link flat-arrow sm  ">
                                        <a href="{{route('office_cleaning',app()->getLocale())}}" class="more_btn__block">More
                                            <i class="fa fa-angle-right"></i> </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 mt-sm-30 mt-xs-30 border p-1" style="border-color: green;">
                    <div class="img-scale">
                        <figure>
                            <img src="{{asset('assets/images/moving.jpg')}}" alt="" style=" height:250px">
                        </figure>
                        <div class="latest__block-post gray-bg">
                            @if(!empty($transport))
                                <div class="meta-post">
                                    <h3 class="text-success">{{$transport->translation()->title ?? "Arisha Service"}}</h3>
                                </div>


                                <div class="flat-link flat-arrow sm  ">
                                    <br>
                                    <a href="{{route('craftsman_services',app()->getLocale())}}">
                                        {!!  Illuminate\Support\Str::limit($transport->translation()->details,200 ) ?? " Arisha Service" !!}
                                    </a>
                                    <div class="flat-link flat-arrow sm  ">
                                        <a href="{{route('craftsman_services',app()->getLocale())}}" class="more_btn__block">More
                                            <i class="fa fa-angle-right"></i> </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-sm-30 mt-xs-30 border p-1" style="border-color: green;">
                    <div class="img-scale">
                        <figure>
                            <img src="{{asset('assets/images/blog/home_blog_3.jpg')}}" alt="" style=" height:250px">
                        </figure>
                        <div class="latest__block-post gray-bg">
                            @if(!empty($cleaning))
                                <div class="meta-post">
                                    <h3 class="text-success">{{$cleaning->translation()->title ?? "Arisha Service"}}</h3>

                                </div>
                                <p class="text-justify">
                                    <a href="{{route('home_cleaning',app()->getLocale())}}">
                                        {!!  Illuminate\Support\Str::limit($cleaning->translation()->details,200 ) ?? " Arisha Service" !!}
                                    </a></p>
                                <div class="flat-link flat-arrow sm  ">
                                    <a href="{{route('home_cleaning',app()->getLocale())}}" class="more_btn__block">More
                                        <i class="fa fa-angle-right"></i> </a>
                                </div>
                            @endif



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="padding ptb-xs-40">
        <div class="container">
            @if(!empty($quality_services))
            <div class="row pb-30">
                <div class="col-md-4 d-flex align-items-center">
                    <div class="section_tit">
                        <h2>{{$quality_services->translation()->title ?? "Arisha Service"}}</h2>
                        <span class="b-line l-left sm-l-center"></span>
                    </div>
                </div>

                <div class="col-md-8 mt-xs-30 text-center text-md-left">
                <div class="text-justify">
                    {!! $quality_services->translation()->details  ?? "Arisha Service" !!}

                </div>
                </div>
            </div>
            @endif

            <div class="row mt-30 mt-xs-0">
                <div class="col-lg-3 col-md-6">
                    <div class="clean_top mb-xs-30 feature-box">
                        <div class="content">
                            <i class="fas fa-truck-moving fa-2x " style="color: green; height: 50px; width: 150px;"></i>

                            <h3>Expert</h3>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="clean_top mb-xs-30 feature-box">
                        <div class="content">
                            <img src="{{asset('assets/images/cleaner.svg')}}" alt="" height="50" width="50"/>
                            <h3>Secure Services</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-sm-30">
                    <div class="clean_top mb-xs-30 feature-box">
                        <div class="content">
                            <img src="{{asset('assets/images/clean.svg')}}" alt="" height="50" width="50"/>
                            <h3>Low Costing</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-sm-30">
                    <div class="clean_top mb-xs-30 feature-box">
                        <div class="content">
                            <i class="fas fa-paint-roller fa-2x " style="color: green; height: 50px; width: 150px;"></i>
                            <h3>On Time</h3>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Service_Section -->
    @if(!empty($about_us))
    <section class="padding ptb-xs-40 gray-bg service_sec">
        <div class="container">
            <div class="row text-center mb-xs-30">
                <div class="col-md-12  col-lg-12 ">
                    <div class="section-title_home">
                        <h2>{{$about_us->translation()->title ?? "Arisha Service"}}</h2>
                        <span class="b-line"></span>
                        <p class="text-justify">
                            {!! $about_us->translation()->details  ?? "Arisha Service" !!}
                        </p>
                    </div>
                </div>
            </div>


        </div>
    </section>
    @endif






@endsection
