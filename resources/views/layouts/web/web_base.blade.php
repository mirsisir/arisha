<!DOCTYPE html>
<html lang="en">

<!-- index06:35-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chillclean - Cleaning Services HTML5 Bootstrap4 Responsive Template</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.min.css')}}"  rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/ionicons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/jquery.fancybox.css')}}" rel="stylesheet" type="text/css">
    <!--Main Slider-->
    <link href="{{asset('assets/css/settings.css')}}" type="text/css" rel="stylesheet" media="screen">
    <link href="{{asset('assets/css/layers.css')}}" type="text/css" rel="stylesheet" media="screen">
    <link href="{{asset('assets/css/layers.css')}}" type="text/css" rel="stylesheet" media="screen">
    <link href="{{asset('assets/css/owl.carousel.css')}}" type="text/css" rel="stylesheet" media="screen">

    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/header.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/footer.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/index.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/theme-color/default.css')}}" rel="stylesheet" type="text/css" id="theme-color" />
    @livewireStyles
</head>
<body>
<!--loader-->
<div id="preloader">
    <div class="sk-circle">
        <div class="sk-circle1 sk-child"></div>
        <div class="sk-circle2 sk-child"></div>
        <div class="sk-circle3 sk-child"></div>
        <div class="sk-circle4 sk-child"></div>
        <div class="sk-circle5 sk-child"></div>
        <div class="sk-circle6 sk-child"></div>
        <div class="sk-circle7 sk-child"></div>
        <div class="sk-circle8 sk-child"></div>
        <div class="sk-circle9 sk-child"></div>
        <div class="sk-circle10 sk-child"></div>
        <div class="sk-circle11 sk-child"></div>
        <div class="sk-circle12 sk-child"></div>
    </div>
</div>

<!--loader-->

<!-- HEADER -->
<header>
    <div class="middel-part__block">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 logo col-md-12 d-flex align-items-center">

                    <a href="index-2.html"> <img src="{{asset('assets/images/logo.png')}}" alt="Logo"> </a>

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle hidden-lg-up" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>

                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="top-info__block text-right">
                        <ul>
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <p>
                                    {{ __('13005 Greenvile Avenue') }}


                                    <span> California, TX 70240</span>
                                </p>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <p>
                                    Call Us
                                    <span> +56 (0) 012 345 6789</span>
                                </p>
                            </li>
                            <li>
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <p>
                                    Mail Us
                                    <span> <a href="mailto:info@gmail.com">info@gmail.com</a> </span>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main_nav stricky-header__top navbar-toggleable-md">

        <nav class="navbar navbar-default navbar-sticky bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->

                <!-- End Header Navigation -->
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav mobile-menu  float-right">
                        <li>
                            <a class="m-0 p-1" href="{{route('page.homepage',app()->getLocale())}}">{{__('Erste Seite')}}</a>
                        </li>

                        <li>
                            <a href="{{route('contact_us',app()->getLocale())}}">{{__('Contact')}}</a>
                        </li>

                        <li>
                            <a href="/contact_us">Contact</a>
                        </li>
                        <li>
                            <a href="{{route('services_request',app()->getLocale())}}">{{__('Service-Anfrage')}}</a>
                        </li>

{{--                        <ul class="nav navbar-nav mobile-menu  float-right">--}}
                        <div class="float-right mt-2">

                            <div class="m-1 btn btn-info"  >
                                <a href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(),'en')}}">EN</a>

                            </div>
                            <div class=" m-1 btn btn-info float-left  " >
                                <a href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(),'de')}}">De</a>
                            </div>

                        </div>


                        {{--                            <li class="float-right">--}}
{{--                                <a href="#!">language</a>--}}
{{--                                <span class="submenu-button"></span>--}}
{{--                                <ul class="dropdown-menu">--}}
{{--                                    <li>--}}
{{--                                        <a href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(),'en')}}">English(EN)</a>--}}
{{--                                    </li>--}}

{{--                                    <li>--}}
{{--                                        <a href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(),'de')}}">German(de)</a>--}}
{{--                                    </li>--}}

{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        </ul>--}}


                    </ul>

                </div>

                <!--navbar-collapse -->
            </div>
        </nav>
    </div>
</header>

<!-- END HEADER -->
@yield('content')
{{ $slot ?? '' }}

<!-- Blog_End -->
<footer class="footer pt-50">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 footer_logo">
                <a href="index-2.html"><img src="{{asset('assets/images/footer_logo.png')}}" alt=""></a>
                <p>
                    Lorem ipsum dolor amet natum latine copiosa at quo, suas labore saperet has there any quote for write lorem percit latineu suas dummy.
                </p>
                <ul>
                    <li>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>

            <div class="col-md-6 col-lg-2 mt-xs-30 link_footer">
                <h4>Information</h4>
                <ul>
                    <li>
                        <a href="#">About us</a>
                    </li>
                    <li>
                        <a href="#">Service</a>
                    </li>
                    <li>
                        <a href="#">Project</a>
                    </li>
                    <li>
                        <a href="/terms_of_services">Terms of Services</a>
                    </li>
                    <li>
                        <a href="#">Contact us</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-6 col-lg-3 mt-sm-30 mt-xs-30 footer-latest-news">
                <h4>Latest News</h4>
                <div class="single-news">
                    <h5><a href="#">How can be successfull in market place..</a></h5>
                    <span>13 Nov, 2018  /  Business</span>
                </div>
                <div class="single-news">
                    <h5><a href="#">How can be successfull in market place..</a></h5>
                    <span>13 Nov, 2018  /  Business</span>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mt-sm-30 mt-xs-30 footer-subscribe">
                <h4>Subscribe Us</h4>
                <p>
                    Lorem ipsum dolor amet natum latine copiosa at quo, suas labore saperet has there any quote.
                </p>
                <form action="#">
                    <input type="text" placeholder="Enter your e-mail">
                    <button class="btn-text">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </button>
                </form>

            </div>

        </div>
    </div>
    <div class="bottom-footer text-center">
        <div class="container">
            <div class="bor_top clearfix">
                <p>
                    <a href="https://www.templateshub.net" target="_blank">Templates Hub</a>
                </p>

            </div>
        </div>
    </div>
</footer>

<!-- Site Wraper End -->
<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/tether.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.easing.js')}}" ></script>

<!-- fancybox Js -->
<script src="{{asset('assets/js/jquery.mousewheel-3.0.6.pack.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/jquery.fancybox.pack.js')}}" type="text/javascript"></script>
<!-- carousel Js -->
<script src="{{asset('assets/js/owl.carousel.js')}}"></script>

<!-- imagesloaded Js -->
<script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}" type="text/javascript"></script>
<!-- masonry,isotope Effect Js -->
<script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/isotope.pkgd.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/masonry.pkgd.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/jquery.appear.js')}}" type="text/javascript"></script>
<!-- Mail Function Js -->
<script src="{{asset('assets/js/mail.js' )}}" type="text/javascript></script>

<!-- revolution Js -->
<script type="text/javascript" src="{{asset('assets/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.themepunch.revolution.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/extensions/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/extensions/revolution.extension.parallax.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.revolution.js')}}"></script>
<!-- custom Js -->
<script src="{{asset('assets/js/custom.js')}}" type="text/javascript"></script>

@livewireScripts

</body>

<!-- index06:36-->
</html>

