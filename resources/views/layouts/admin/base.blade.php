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
                <li class="nav-item  dropdown d-none d-md-block">
                    <a class="nav-link dropdown-toggle" id="reportDropdown" href="#" data-toggle="dropdown"
                       aria-expanded="false"> Reports </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="reportDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="mdi mdi-file-pdf mr-2"></i>PDF </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <i class="mdi mdi-file-excel mr-2"></i>Excel </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <i class="mdi mdi-file-word mr-2"></i>doc </a>
                    </div>
                </li>
                <li class="nav-item  dropdown d-none d-md-block">
                    <a class="nav-link dropdown-toggle" id="projectDropdown" href="#" data-toggle="dropdown"
                       aria-expanded="false"> Projects </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="projectDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="mdi mdi-eye-outline mr-2"></i>View Project </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <i class="mdi mdi-pencil-outline mr-2"></i>Edit Project </a>
                    </div>
                </li>
                <li class="nav-item nav-language dropdown d-none d-md-block">
                    <a class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-toggle="dropdown"
                       aria-expanded="false">
                        <div class="nav-language-icon">
                            <i class="flag-icon flag-icon-us" title="us" id="us"></i>
                        </div>
                        <div class="nav-language-text">
                            <p class="mb-1 text-black">English</p>
                        </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                        <a class="dropdown-item" href="#">
                            <div class="nav-language-icon mr-2">
                                <i class="flag-icon flag-icon-ae" title="ae" id="ae"></i>
                            </div>
                            <div class="nav-language-text">
                                <p class="mb-1 text-black">Arabic</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <div class="nav-language-icon mr-2">
                                <i class="flag-icon flag-icon-gb" title="GB" id="gb"></i>
                            </div>
                            <div class="nav-language-text">
                                <p class="mb-1 text-black">English</p>
                            </div>
                        </a>
                    </div>
                </li>
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
                    <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm"
                         aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                        <div class="p-3 text-center bg-primary">
                            <img class="img-avatar img-avatar48 img-avatar-thumb"
                                 src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/images/faces/face28.png"
                                 alt="">
                        </div>
                        <div class="p-2">
                            <h5 class="dropdown-header text-uppercase pl-2 text-dark">User Options</h5>
                            <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                               href="#">
                                <span>Inbox</span>
                                <span class="p-0">
                                        <span class="badge badge-primary">3</span>
                                        <i class="mdi mdi-email-open-outline ml-1"></i>
                                    </span>
                            </a>
                            <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                               href="#">
                                <span>Profile</span>
                                <span class="p-0">
                                        <span class="badge badge-success">1</span>
                                        <i class="mdi mdi-account-outline ml-1"></i>
                                    </span>
                            </a>
                            <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                               href="javascript:void(0)">
                                <span>Settings</span>
                                <i class="mdi mdi-settings"></i>
                            </a>
                            <div role="separator" class="dropdown-divider"></div>
                            <h5 class="dropdown-header text-uppercase  pl-2 text-dark mt-2">Actions</h5>
                            <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                               href="#">
                                <span>Lock Account</span>
                                <i class="mdi mdi-lock ml-1"></i>
                            </a>
                            <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                               href="#">
                                <span>Log Out</span>
                                <i class="mdi mdi-logout ml-1"></i>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                       data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-email-outline"></i>
                        <span class="count-symbol bg-success"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                         aria-labelledby="messageDropdown">
                        <h6 class="p-3 mb-0 bg-primary text-white py-4">Messages</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/images/faces/face4.jpg"
                                     alt="image" class="profile-pic">
                            </div>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message
                                </h6>
                                <p class="text-gray mb-0"> 1 Minutes ago </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/images/faces/face2.jpg"
                                     alt="image" class="profile-pic">
                            </div>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a
                                    message</h6>
                                <p class="text-gray mb-0"> 15 Minutes ago </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/images/faces/face3.jpg"
                                     alt="image" class="profile-pic">
                            </div>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated
                                </h6>
                                <p class="text-gray mb-0"> 18 Minutes ago </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <h6 class="p-3 mb-0 text-center">4 new messages</h6>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                       data-toggle="dropdown">
                        <i class="mdi mdi-bell-outline"></i>
                        <span class="count-symbol bg-danger"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                         aria-labelledby="notificationDropdown">
                        <h6 class="p-3 mb-0 bg-primary text-white py-4">Notifications</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="mdi mdi-calendar"></i>
                                </div>
                            </div>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                                <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-warning">
                                    <i class="mdi mdi-settings"></i>
                                </div>
                            </div>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                                <p class="text-gray ellipsis mb-0"> Update dashboard </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="mdi mdi-link-variant"></i>
                                </div>
                            </div>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                                <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <h6 class="p-3 mb-0 text-center">See all notifications</h6>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
        <div class="theme-setting-wrapper">
            <div id="color-settings" class="settings-panel">
                <i class="settings-close mdi mdi-close"></i>
                <div class="d-flex align-items-center justify-content-between border-bottom">
                    <p class="settings-heading font-weight-bold border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">
                        Template Skins</p>
                </div>
                <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                </div>
                <p class="settings-heading font-weight-bold mt-2">Header Skins</p>
                <div class="color-tiles mx-0 px-2">
                    <div class="tiles primary"></div>
                    <div class="tiles success"></div>
                    <div class="tiles warning"></div>
                    <div class="tiles danger"></div>
                    <div class="tiles pink"></div>
                    <div class="tiles info"></div>
                    <div class="tiles dark"></div>
                    <div class="tiles default"></div>
                </div>
            </div>
        </div>
        <div id="right-sidebar" class="settings-panel">
            <i class="settings-close mdi mdi-close"></i>
            <div class="d-flex align-items-center justify-content-between border-bottom">
                <p class="settings-heading font-weight-bold border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">
                    Friends</p>
            </div>
            <ul class="chat-list">
                <li class="list active">
                    <div class="profile">
                        <img src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/images/faces/face3.jpg"
                             alt="image">
                        <span class="online"></span>
                    </div>
                    <div class="info">
                        <p>Thomas Douglas</p>
                        <p>Available</p>
                    </div>
                    <small class="text-muted my-auto">19 min</small>
                </li>
                <li class="list">
                    <div class="profile">
                        <img src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/images/faces/face2.jpg"
                             alt="image">
                        <span class="offline"></span>
                    </div>
                    <div class="info">
                        <div class="wrapper d-flex">
                            <p>Catherine</p>
                        </div>
                        <p>Away</p>
                    </div>
                    <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                    <small class="text-muted my-auto">23 min</small>
                </li>
                <li class="list">
                    <div class="profile">
                        <img src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/images/faces/face3.jpg"
                             alt="image">
                        <span class="online"></span>
                    </div>
                    <div class="info">
                        <p>Daniel Russell</p>
                        <p>Available</p>
                    </div>
                    <small class="text-muted my-auto">14 min</small>
                </li>
                <li class="list">
                    <div class="profile">
                        <img src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/images/faces/face4.jpg"
                             alt="image">
                        <span class="offline"></span>
                    </div>
                    <div class="info">
                        <p>James Richardson</p>
                        <p>Away</p>
                    </div>
                    <small class="text-muted my-auto">2 min</small>
                </li>
                <li class="list">
                    <div class="profile">
                        <img src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/images/faces/face5.jpg"
                             alt="image">
                        <span class="online"></span>
                    </div>
                    <div class="info">
                        <p>Madeline Kennedy</p>
                        <p>Available</p>
                    </div>
                    <small class="text-muted my-auto">5 min</small>
                </li>
                <li class="list">
                    <div class="profile">
                        <img src="https://www.bootstrapdash.com/demo/connect-plus/laravel/template/demo_1/assets/images/faces/face6.jpg"
                             alt="image">
                        <span class="online"></span>
                    </div>
                    <div class="info">
                        <p>Sarah Graves</p>
                        <p>Available</p>
                    </div>
                    <small class="text-muted my-auto">47 min</small>
                </li>
            </ul>
        </div>
        <nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-category">Main Features</li>
{{--                <li class="nav-item ">--}}
{{--                    <a class="nav-link" data-toggle="collapse" href="#client" aria-expanded="false"--}}
{{--                       aria-controls="client">--}}
{{--                        <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>--}}
{{--                        <span class="menu-title">Client</span>--}}
{{--                        <i class="menu-arrow"></i>--}}
{{--                    </a>--}}
{{--                    <div class="collapse " id="client">--}}
{{--                        <ul class="nav flex-column sub-menu">--}}
{{--                            <li class="nav-item ">--}}
{{--                                <a class="nav-link" href="{{ route('client.settings') }}">Client List</a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="nav-item ">--}}
{{--                    <a class="nav-link" data-toggle="collapse" href="#employee" aria-expanded="false"--}}
{{--                       aria-controls="employee">--}}
{{--                        <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>--}}
{{--                        <span class="menu-title">Allocations</span>--}}
{{--                        <i class="menu-arrow"></i>--}}
{{--                    </a>--}}
{{--                    <div class="collapse " id="employee">--}}
{{--                        <ul class="nav flex-column sub-menu">--}}
{{--                            <li class="nav-item ">--}}
{{--                                <a class="nav-link" href="{{ route('designation') }}">Designation List</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item ">--}}
{{--                                <a class="nav-link" href="{{ route('employee.settings') }}">Employee List</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item ">--}}
{{--                                <a class="nav-link" href="{{ route('employee.allotments') }}">Employee--}}
{{--                                    Allocations</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item ">--}}
{{--                                <a class="nav-link" href="{{ route('product.allotments') }}">Product Allocation</a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="nav-item ">--}}
{{--                    <a class="nav-link" data-toggle="collapse" href="#supplier" aria-expanded="false"--}}
{{--                       aria-controls="supplier">--}}
{{--                        <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>--}}
{{--                        <span class="menu-title">Supplier</span>--}}
{{--                        <i class="menu-arrow"></i>--}}
{{--                    </a>--}}
{{--                    <div class="collapse " id="supplier">--}}
{{--                        <ul class="nav flex-column sub-menu">--}}
{{--                            <li class="nav-item ">--}}
{{--                                <a class="nav-link" href="{{ route('supplier.settings') }}">Supplier List</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="nav-item ">--}}
{{--                    <a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false"--}}
{{--                       aria-controls="uniform">--}}
{{--                        <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>--}}
{{--                        <span class="menu-title">Product</span>--}}
{{--                        <i class="menu-arrow"></i>--}}
{{--                    </a>--}}
{{--                    <div class="collapse " id="product">--}}
{{--                        <ul class="nav flex-column sub-menu">--}}
{{--                            <li class="nav-item ">--}}
{{--                                <a class="nav-link" href="{{ route('brand') }}">Brand List</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item ">--}}
{{--                                <a class="nav-link" href="{{ route('product.settings') }}">Product List</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item ">--}}
{{--                                <a class="nav-link" href="{{ route('product.allotments') }}">Product Allocation</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item ">--}}
{{--                                <a class="nav-link" href="{{ route('product.return') }}">Product Return</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item ">--}}
{{--                                <a class="nav-link" href="{{ route('product_return_report_date') }}">Product Return Report</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item ">--}}
{{--                                <a class="nav-link" href="{{ route('product.destroy') }}">Product Destroy</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item ">--}}
{{--                                <a class="nav-link" href="{{ route('product_destroy_report_date') }}">Product Destroy Report</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="nav-item ">--}}
{{--                    <a class="nav-link" data-toggle="collapse" href="#purchase" aria-expanded="false"--}}
{{--                       aria-controls="purchase">--}}
{{--                        <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>--}}
{{--                        <span class="menu-title">Purchase</span>--}}
{{--                        <i class="menu-arrow"></i>--}}
{{--                    </a>--}}
{{--                    <div class="collapse " id="purchase">--}}
{{--                        <ul class="nav flex-column sub-menu">--}}
{{--                            <li class="nav-item ">--}}
{{--                                <a class="nav-link" href="{{ route('purchase') }}">Purchase Product</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item ">--}}
{{--                                <a class="nav-link" href="{{ route('purchase_report_date') }}">Purchase Report</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item ">--}}
{{--                                <a class="nav-link" href="{{ route('purchase.return') }}">Purchase Return</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item ">--}}
{{--                                <a class="nav-link" href="{{ route('purchase_return_report_date') }}">Purchase Return Report</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#uniform" aria-expanded="false"
                       aria-controls="uniform">
                        <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                        <span class="menu-title">Uniform</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse " id="uniform">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('uniform.settings') }}">Uniform List</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('uniform.allotments') }}">Uniform allotment</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('uniform.collection') }}">Old Uniform Collection</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('return_report_date') }}">Uniform Collection Report</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('uniform.destroy') }}">Uniform Destroy</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('destroy_report_date') }}">Uniform Destroy Report</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#service" aria-expanded="false"
                       aria-controls="service">
                        <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                        <span class="menu-title">Service</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse " id="service">
                        <ul class="nav flex-column sub-menu">

                            <li class="nav-item ">
                                <a class="nav-link" href="{{route('service_request')}}">Service Request</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{route('hold_request')}}">hold Service Request</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{route('confirm_request')}}">Confirm Service Request</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{route('today_Request')}}">Today"s Service Request</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="/calender">Calender</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('category') }}">Service List</a>
                            </li>


                        </ul>
                    </div>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#employee1" aria-expanded="false"
                       aria-controls="employee1">
                        <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                        <span class="menu-title">Employee</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse " id="employee1">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('employee_list') }}">Employee List</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('employee_create') }}">Add Employee</a>
                            </li>

                        </ul>
                    </div>
                </li>




                <li class="nav-item active">
                    <a class="nav-link"
                       href="{{route('partner_request')}}">
                        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                        <span class="menu-title">Partner Request</span>
                    </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link"
                       href="{{route('department')}}">
                        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                        <span class="menu-title">Department</span>
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
        <div class="main-panel p-5">
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
