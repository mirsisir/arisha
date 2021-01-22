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
                <li data-index="rs-129"  >
                    <!-- MAIN IMAGE -->
                    <img src="{{asset('assets/images/banner/slider1.jpg')}}"  alt=""  class="rev-slidebg" >
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
                         data-responsive_offset="on" >
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
                    <img src="{{asset('assets/images/banner/slider2.jpg')}}"  alt=""   class="rev-slidebg">
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
                            <h2>Professional Cleaning Services Provider</h2>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever.
                            </p>
                            <a class="btn-text" href="#"> Read More</a>
                        </div>
                    </div>
                </li>
                <!-- SLIDE  -->
                <li data-index="rs-131">
                    <!-- MAIN IMAGE -->
                    <img src="{{asset('assets/images/banner/slider3.jpg')}}"  alt=""   class="rev-slidebg " >
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
                            <span class="sub-text">we are here to help you</span>
                            <h2>We Are Cleaning Manager Always at Your Service.</h2>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever.
                            </p>
                            <a class="btn-text" href="#"> Read More</a>
                        </div>
                    </div>
                </li>
                <!-- SLIDE  -->
            </ul>
            <div class="tp-bannertimer tp-bottom"></div>
        </div>
    </div>
</div>
<!--  Main Banner End Here-->

<!-- About -->
<section class="padding ptb-xs-40">
    <div class="container">
        <div class="row pb-30">
            <div class="col-md-4 d-flex align-items-center">
                <div class="section_tit">
                    <h2>{{__('About Us')}}</h2>
                    <span class="b-line l-left sm-l-center"></span>
                </div>
            </div>

            <div class="col-md-8 mt-xs-30 text-center text-md-left">
                <p>
                    {{__('We are happy to relieve you of the work around the house and apartment so that you have time for the important things. We are happy to hear from them!')}}
                </p>
                <p>
                    {{__('Arisha Services has been offering you versatile cleaning and craftsman services of the highest quality since 2017. We always follow your individual expectations and look after you personally, comfortably and inexpensively.')}}
                </p>
            </div>
        </div>

        <div class="row mt-30 mt-xs-0">
            <div class="col-lg-3 col-md-6">
                <div class="clean_top mb-xs-30 feature-box">
                    <div class="content">
                        <img src="{{asset('assets/images/cleaning-lady.svg')}}" alt="" height="50" width="50" />
                        <h3>Expert</h3>
                        <p>
                            Lorem Ipsum is simply text the printing and typesetting standard industry.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="clean_top mb-xs-30 feature-box">
                    <div class="content">
                        <img src="{{asset('assets/images/cleaner.svg')}}" alt="" height="50" width="50" />
                        <h3>Secure Services</h3>
                        <p>
                            Lorem Ipsum is simply text the printing and typesetting standard industry.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-sm-30">
                <div class="clean_top mb-xs-30 feature-box">
                    <div class="content">
                        <img src="{{asset('assets/images/clean.svg')}}" alt="" height="50" width="50" />
                        <h3>Low Costing</h3>
                        <p>
                            Lorem Ipsum is simply text the printing and typesetting standard industry.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-sm-30">
                <div class="clean_top mb-xs-30 feature-box">
                    <div class="content">
                        <img src="{{asset('assets/images/clean-1.svg')}}" alt="" height="50" width="50" />
                        <h3>On Time</h3>
                        <p>
                            Lorem Ipsum is simply text the printing and typesetting standard industry.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- About -->

<!-- Service_Section -->
<section class="padding ptb-xs-40 gray-bg service_sec">
    <div class="container">
        <div class="row text-center mb-xs-30">
            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                <div class="section-title_home">
                    <h2>Quality Services</h2>
                    <span class="b-line"></span>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the 's standard dummy text.
                    </p>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="service_slider_home next_btn_style">

                    @foreach($all_service as $service)
                    <div class="service_box">
                        <figure>
                            <img src="{{asset('assets/images/service/img_1.jpg')}}" alt="" />
                        </figure>
                        <h3><a href="#">{{$service->name}}</a></h3>
                        <h5><a class="text-danger" href="#">Service Charge: {{$service->charge}}</a></h5>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam quos aperiam ipsam modi dolor suscipit asperiores perspiciatis.
                        </p>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>

    </div>
</section>
<!-- Service_Section_End -->

<!-- Section -->
<section class="question_sec pt-90 pt-xs-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="email_gardener">
                    <div class="section_tit light-color">
                        <h2>Have Any Question</h2>
                        <span class="three_line"></span>
                    </div>
                    <div class="text_heading mb-30 light-color">
                        <p>
                            Lorem ipsum dolor sit amet, ligula vestibulum nunc dis ipsum, et nam, cras nec lacus amet, ut mauris erat mattis neque a quis. Vivamus donec dolor consectetuer congue.
                        </p>
                    </div>
                    <div class="email_fill">
                        <form>
                            <div class="form-field">
                                <input class="input-sm" id="email" type="text" name="form-email" placeholder="Your Email">
                                <button class="btn-text" type="button" id="submit" name="button">
                                    Subscribe
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-sm-30 mt-xs-30">
                <figure>
                    <img src="{{asset('assets/images/img4.png')}}" alt="">
                </figure>
            </div>
        </div>
    </div>
</section>
<!-- Section_End -->

<!-- Team -->
<section class="padding ptb-xs-40">
    <div class="container">
        <div class="row text-center mb-40 mb-xs-30">
            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                <div class="section-title_home">
                    <h2>Our Team</h2>
                    <span class="b-line"></span>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the 's standard dummy text.
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="team_box img-scale">
                    <div class="team_picher">
                        <figure>
                            <img src="{{asset('assets/images/team/team1.jpg')}}" alt="">
                        </figure>
                    </div>
                    <div class="team_detail">
                        <h3>Josh Philippe</h3>
                        <span>Senior Developer</span>
                    </div>
                    <div class="team_text">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </p>
                    </div>
                    <div class="social_team">
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-xs-30">
                <div class="team_box img-scale">
                    <div class="team_picher">
                        <figure>
                            <img src="{{asset('assets/images/team/team2.jpg')}}" alt="">
                        </figure>
                    </div>
                    <div class="team_detail">
                        <h3>Marcus Stoinis</h3>
                        <span>Senior Developer</span>
                    </div>
                    <div class="team_text">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </p>
                    </div>
                    <div class="social_team">
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-sm-30 mt-xs-30">
                <div class="team_box img-scale">
                    <div class="team_picher">
                        <figure>
                            <img src="{{asset('assets/images/team/team3.jpg')}}" alt="">
                        </figure>
                    </div>
                    <div class="team_detail">
                        <h3>Jackson Coleman</h3>
                        <span>Senior Developer</span>
                    </div>
                    <div class="team_text">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </p>
                    </div>
                    <div class="social_team">
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-sm-30 mt-xs-30">
                <div class="team_box img-scale">
                    <div class="team_picher">
                        <figure>
                            <img src="{{asset('assets/images/team/team4.jpg')}}" alt="">
                        </figure>
                    </div>
                    <div class="team_detail">
                        <h3>Mackenzie Harvey</h3>
                        <span>Senior Developer</span>
                    </div>
                    <div class="team_text">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </p>
                    </div>
                    <div class="social_team">
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<!-- Team_End -->


@endsection
