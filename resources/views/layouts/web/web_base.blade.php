<!DOCTYPE html>
<html lang="en">

<!-- index06:35-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/ionicons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/jquery.fancybox.css')}}" rel="stylesheet" type="text/css">
    <!--Main Slider-->
    <link href="{{asset('assets/css/settings.css')}}" type="text/css" rel="stylesheet" media="screen">
    <link href="{{asset('assets/css/layers.css')}}" type="text/css" rel="stylesheet" media="screen">
    <link href="{{asset('assets/css/layers.css')}}" type="text/css" rel="stylesheet" media="screen">
    <link href="{{asset('assets/css/owl.carousel.css')}}" type="text/css" rel="stylesheet" media="screen">

    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/header.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/footer.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/index.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/theme-color/default.css')}}" rel="stylesheet" type="text/css" id="theme-color"/>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/searchpanes/1.2.1/css/searchPanes.dataTables.min.css" rel="stylesheet"/>
    <link href="    https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css" rel="stylesheet"/>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @livewireStyles
    <script  defer src="https://maps.googleapis.com/maps/api/js?libraries=places&language=en&key=AIzaSyB779Mep4XZ5hC6KX-Jrl9kjAMEP8V0JEA"  type="text/javascript"></script>

</head>
<body>
@php($settings = \App\Models\GeneralSettings::take(-1)->first())
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
                        <button type="button" class="navbar-toggle hidden-lg-up" data-toggle="collapse"
                                data-target="#navbar-menu">
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


                                    <span>  {{$settings->street ?? " "}}{{$settings->house_number ?? " "}} </br
                                        {{$settings->city ?? " "}}{{$settings->post_code ?? " "}} <br>
                                        {{$settings->hrb ?? " "}} </span>
                                </p>

                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <p>
                                    {{__('Call Us')}}
                                    <span> {{$settings->phone?? " "}}</span>
                                </p>
                            </li>
                            <li>
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <p>
                                    Mail Us
                                    <span> <a href="mailto:info@gmail.com">{{$settings->email ?? " "}}</a> </span>
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
                            <a class="m-0 p-1"
                               href="{{route('page.homepage',app()->getLocale())}}">{{__('Erste Seite')}}</a>
                        </li>


                        <li>
                            <a href="{{route('partner_registration',app()->getLocale())}}">{{__('Ein Partner Werden')}}</a>
                        </li>


                        <li>
                            <a href="{{route('all_services',app()->getLocale())}}">{{__('Pricing')}}</a>
                        </li>

                        {{--                        <li>--}}
                        {{--                            <a href="{{route('services_request',['language'=>app()->getLocale(),'id'=>2])}}">{{__('Bal')}}</a>--}}
                        {{--                        </li>--}}


                        @if (Auth::check())
                            <li>
                                <a href="{{route('customer_dashboard',app()->getLocale())}}">{{__('Dashboard')}}</a>
                            </li>

                        @endif


                        {{--                        <ul class="nav navbar-nav mobile-menu  float-right">--}}
                        <div class="float-right mt-2">

                            <div class="m-1 btn btn-info">
                                <a href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(),'en')}}">EN</a>

                            </div>
                            <div class=" m-1 btn btn-info   mr-2">
                                <a href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(),'de')}}">De</a>
                            </div>


                            <div class=" ml-4 m-1 btn btn-info float-right  ">

                                @if (Auth::check())


                                    <a class="" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                @else

                                    {{--                                    <a href="{{route('login',app()->getLocale())}}">login</a>--}}
                                    <a class="" data-toggle="modal" data-target="#modal-success">{{__('Login')}}</a>


                                @endif
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
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong class="container" >{{$error}}</strong> You should check in on some of those fields .
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                @break;
            @endforeach
        @endif
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
                    {{__('Lorem ipsum dolor amet natum latine copiosa at quo, suas labore saperet has there any quote for
                    write lorem percit latineu suas dummy.')}}
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

            <div class="col-md-6 col-lg-3 mt-xs-30 link_footer">
                <h4>{{__('Information')}}</h4>
                <ul>
                    <li>
                        <a href="#">{{__('About us')}}</a>
                    </li>
                    <li>
                        <a href="{{route('all_services',app()->getLocale())}}">{{__('Service')}}</a>
                    </li>
                    <li>
                        <a href="{{route('Impressum',app()->getLocale())}}">{{__('Impressum')}}</a>
                    </li>
                    <li>
                        <a href="{{route('page.terms', app()->getLocale())}}">{{__('Terms of Services')}}</a>
                    </li>
                    <li>
                        <a href="{{route('privacy_policy', app()->getLocale())}}">{{__('Privacy Policy')}}</a>
                    </li>
                    <li>
                        <a href="{{route('partner_registration',app()->getLocale())}}">{{__('Partner Registration')}}</a>
                    </li>
                </ul>
            </div>


            <div class="col-md-6 col-lg-6 mt-sm-30 mt-xs-30 footer-subscribe">
                <h4>{{__('Subscribe Us')}}</h4>
                <p>
                    {{__('If you have any special requirements for your Booking, as well as any query related to our services,
                    then do not hesitate to give us a call . We are happy to serve you.')}} {{$settings->phone?? " "}}
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

<div class="login ">
    <!--Success Modal Templates-->
    <div id="modal-success" class="modal modal-message modal-success fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog " style=" margin-top:15%">
            <div class="modal-content ">
                <div class="modal-header">
                    <i class="glyphicon glyphicon-check"></i>
                </div>
                <div class="modal-title p-2">


                    <div id="register" style="display: none">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button  class="btn btn-info"  onclick="myFunction()">
                                        {{ __('Login') }}
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>

                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="login" id="login">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="login">
                                <div class="form-group row">
                                    <label for="phone"
                                           class="col-md-4 col-form-label text-md-right ">{{ __('Phone No') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="phone"
                                               class="form-control @error('phone') is-invalid @enderror" name="phone"
                                               value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror" name="password"
                                               required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button>
                                        <a class="btn btn-info" onclick="myFunction()">{{ __('Register') }}</a>
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="modal-footer">
                </div>
            </div> <!-- / .modal-content -->
        </div> <!-- / .modal-dialog -->
    </div>


</div>

<script>
    function myFunction() {
        var x = document.getElementById("register");
        var y = document.getElementById("login");

        if (y.style.display === "none") {
            y.style.display = "block";
        } else {
            y.style.display = "none";
        }
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
<!-- Site Wraper End -->
<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/tether.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.easing.js')}}"></script>

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
<script src="{{asset('assets/js/mail.js' )}}"></script>

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

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
</script>

<script src="https://cdn.datatables.net/searchpanes/1.2.1/js/dataTables.searchPanes.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

@yield('js')
@livewireScripts

<script>
    $(function() {
        // add input listeners
        google.maps.event.addDomListener(window, 'load', function () {
            var from_places = new google.maps.places.Autocomplete(document.getElementById('from_places'));
            var to_places = new google.maps.places.Autocomplete(document.getElementById('to_places'));

            google.maps.event.addListener(from_places, 'place_changed', function () {
                var from_place = from_places.getPlace();
                var from_address = from_place.formatted_address;
                $('#from_places').val(from_address);
                calculateDistance()
            });

            google.maps.event.addListener(to_places, 'place_changed', function () {
                var to_place = to_places.getPlace();
                var to_address = to_place.formatted_address;
                $('#to_places').val(to_address);
                calculateDistance()
            });

        });
        // calculate distance
        function calculateDistance() {
            var origin = $('#from_places').val();
            var destination = $('#to_places').val();
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix(
                {
                    origins: [origin],
                    destinations: [destination],
                    travelMode: google.maps.TravelMode.DRIVING,
                    // unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
                    unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
                    avoidHighways: false,
                    avoidTolls: false
                }, callback);
        }
        // get distance results
        function callback(response, status) {
            // alert(response)
            if (status != google.maps.DistanceMatrixStatus.OK) {
                $('#result').html(err);
            } else {
                var origin = response.originAddresses[0];
                var destination = response.destinationAddresses[0];
                if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
                    $('#result').html("Better get on a plane. There are no roads between "  + origin + " and " + destination);
                } else {
                    var distance = response.rows[0].elements[0].distance;
                    var duration = response.rows[0].elements[0].duration;
                    console.log(response.rows[0].elements[0].distance,'sdlfkjsdlfk');
                    var distance_in_kilo = distance.value / 1000; // the kilom
                    // var distance_in_mile = distance.value / 1609.34; // the mile
                    var duration_text = duration.text;
                    var duration_value = duration.value;
                    // $('#in_mile').text(distance_in_mile.toFixed(2));
                    $('#distance').val(distance_in_kilo.toFixed(2));
                    $('#duration_text').text(duration_text);
                    $('#duration_value').text(duration_value);
                    $('#from').text(origin);
                    $('#to').text(destination);
                    Livewire.emit('distanceCalculated',distance_in_kilo.toFixed(2))


                }
            }
        }
        // print results on submit the form
        $('#distance_form').submit(function(e){
            e.preventDefault();
            calculateDistance();
        });

    });

</script>

</body>

<!-- index06:36-->
</html>

