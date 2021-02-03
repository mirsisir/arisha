<!DOCTYPE html>
<html>

<head>
    <title>Dynamic</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_token" content="lnXxI8JRnpqNjT5xdukzoABWZHXw0RW6kfzCnfhl">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- plugin css -->
    <link media="all" type="text/css" rel="stylesheet"
          href="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/plugins/flag-icon-css/css/flag-icon.css">
    {{--
    <link media="all" type="text/css" rel="stylesheet"
        href="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/plugins/@mdi/font/css/materialdesignicons.min.css">
    --}}

    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('css/materialicons.css') }}">

    <link media="all" type="text/css" rel="stylesheet"
          href="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/plugins/perfect-scrollbar/perfect-scrollbar.css">
    <!-- end plugin css -->

    <link media="all" type="text/css" rel="stylesheet"
          href="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/plugins/icheck/skins/all.css">
    <link media="all" type="text/css" rel="stylesheet"
          href="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/plugins/select2/css/select2.min.css">

    <!-- common css -->
    <link media="all" type="text/css" rel="stylesheet"
          href="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/css/app.css">
    <!-- end common css -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" />

    <link media="all" type="text/css" rel="stylesheet" href="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/plugins/fullcalendar/fullcalendar.min.css">


    @yield('css')
    @stack('css')
    @livewireStyles

    <style>
        .fc .fc-button-group .fc-button {
            background-color: white ;
            color:black;
        }
    </style>

</head>

<body data-base-url="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1">

<div class="container-scroller" id="app">
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo"
               href="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1"><img
                    src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/images/logo.svg"
                    alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini"
               href="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1"><img
                    src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/images/logo-mini.svg"
                    alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            <div class="search-field d-none d-xl-block">
                <form class="d-flex align-items-center h-100" action="#">
                    <b><h3 class="text-light font-weight-bold mb-2 mt-2"> {{ $title?? '' }} </h3></b>
                </form>
            </div>
            <ul class="navbar-nav navbar-nav-right">


                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                       aria-expanded="false">
                        <div class="nav-profile-img">
                            <img src="{{ asset('Profile_gray.png') }}" class="img-fluid"
                                 alt="image" >
                        </div>
                        <div class="nav-profile-text">
                            <p class="mb-1 text-black">{{ auth()->user()->name }}</p>
                        </div>
                    </a>
                </li>

            </ul>

        </div>
    </nav>
    <div class="container-fluid page-body-wrapper">

        <nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-category">Main Features</li>


                <li class="nav-item active">
                    <a class="nav-link"
                       href="{{route('services_request_list')}}">
                        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                        <span class="menu-title">Service Request</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link"
                       href="{{route('today_service_list')}}">
                        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                        <span class="menu-title">Today"s Service Request</span>
                    </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link"
                       href="{{route('employee_calender')}}">
                        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                        <span class="menu-title">Calender</span>
                    </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link"
                       href="#">
                        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                        <span class="menu-title">My Bill</span>
                    </a>
                </li>


                <li class="nav-item sidebar-user-actions">
                    <div class="user-details">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="d-flex align-items-center">
                                    <div class="sidebar-profile-img">
                                        <img src="{{ asset('Profile_gray.png') }}" class="img-fluid"
                                             alt="image" >
                                    </div>
                                    <div class="sidebar-profile-text">
                                        <p class="mb-1">{{ auth()->user()->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item sidebar-user-actions">
                    <div class="sidebar-user-menu">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout menu-icon"></i>
                            <span class="menu-title">Log Out</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>


                    </div>
                </li>
            </ul>
        </nav>
        <div class="main-panel p-4">
            @yield('content')
            {{ $slot ?? '' }}
        </div>
    </div>

</div>





<!-- base js -->
<!-- base js -->
<script src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/js/app.js"></script>
<script
    src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js">
</script>
<!-- end base js -->

<!-- plugin js -->
<script
    src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/plugins/icheck/icheck.min.js">
</script>
<script
    src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/plugins/select2/js/select2.min.js">
</script>
<script
    src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/plugins/typeaheadjs/typeahead.bundle.min.js">
</script>
<!-- end plugin js -->

<!-- common js -->
<script
    src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/js/off-canvas.js">
</script>
<script
    src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/js/hoverable-collapse.js">
</script>
<script src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/js/misc.js">
</script>
<script src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/js/settings.js">
</script>
<script src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/js/todolist.js">
</script>
<!-- end common js -->

<script
    src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/js/file-upload.js">
</script>
<script src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/js/iCheck.js">
</script>
<script src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/js/select2.js">
</script>
<script
    src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/js/typeahead.js">
</script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
</script>
@livewireScripts

@yield('js')
@stack('js')


<script>
    // Livewire.hook('message.received', component => {
    //     console.log('intialized success')
    //     $('#employeeSelect').select2()
    //     // alert('bal')
    // })
    // Livewire.hook('component.initialized', component => {
    //     console.log('intialized success')
    //     // $('#employeeSelect').select2()
    //     // alert('bal')
    // })
</script>
</body>

</html>
