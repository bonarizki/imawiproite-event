<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title>WIPRO-UNZA | EVENT - @yield('title')</title>
    <link rel="shortcut icon" href="{{asset('images/wipro.ico')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{asset('images/wipro.ico')}}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    @include('master/include/header')
    <style>
        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url({{ asset('images/Loader-wipro-2.gif') }}) center no-repeat rgba(255,255,255,0.6);
        }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">
    <div class="se-pre-con"></div>
    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item">
                    <a class="navbar-brand" href="{{url('/')}}">
                        <div>
                            <img src="{{asset('images/wipro-logo.png')}}" alt="" height="50px" width="65px">
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="{{url('/')}}"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            <li class="nav-item d-none d-lg-block mt-1">
                                <h3>EMPLOYEE GATHERING</h3>
                            </li>
                        </ul>
                    </div>
                    @if (Auth::user())
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none">
                                    <span class="user-name text-bold-600"></span>
                                </div>
                                <span ><i class="feather icon-user font-medium-5"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{url('/')}}">
                                    <i class="feather icon-home"></i> Back To Home
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="">
                                    <i class="feather icon-power"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto">
                        <a class="navbar-brand">
                            <h2 class="brand-text mb-0">EMPLOYEE <br> GATHERING</h2>
                        </a>
                    </li>
                    <li class="nav-item nav-toggle">
                        <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                            <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                            <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                <!-- include {{asset('assets_vuexy/includes/mixins')}}-->
                <ul class="nav navbar-nav hover" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class="nav-item active">
                        <a class="nav-link" href="">
                            <i class="feather icon-home"></i>
                            <span data-i18n="">Dashboard</span>
                        </a>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown">
                        <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">
                            <i class="fa fa-gift"></i>
                            <span data-i18n="Apps">Doorprize</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li data-menu="">
                                <a class="dropdown-item" href="{{route('batch-1')}}" data-toggle="dropdown" data-i18n="Batch I">
                                    <i class="fa fa-random"></i>Batch I
                                </a>
                            </li>
                            <li data-menu="">
                                <a class="dropdown-item" href="{{route('batch-2')}}" data-toggle="dropdown" data-i18n="Batch II">
                                    <i class="fa fa-random"></i>Batch II
                                </a>
                            </li>
                            <li data-menu="">
                                <a class="dropdown-item" href="{{route('batch-3')}}" data-toggle="dropdown" data-i18n="Batch III">
                                    <i class="fa fa-random"></i>Batch III
                                </a>
                            </li>
                            <li data-menu="">
                                <a class="dropdown-item" href="{{route('batch-4')}}" data-toggle="dropdown" data-i18n="Batch IV">
                                    <i class="fa fa-random"></i>Batch IV
                                </a>
                            </li>
                            <li data-menu="">
                                <a class="dropdown-item" href="{{route('batch-5')}}" data-toggle="dropdown" data-i18n="Batch V">
                                    <i class="fa fa-random"></i>Batch V
                                </a>
                            </li>
                            <li data-menu="">
                                <a class="dropdown-item" href="{{route('batch-6')}}" data-toggle="dropdown" data-i18n="Batch VI">
                                    <i class="fa fa-random"></i>Batch VI
                                </a>
                            </li>
                            <li data-menu="">
                                <a class="dropdown-item" href="{{route('batch-7')}}" data-toggle="dropdown" data-i18n="Batch VII">
                                    <i class="fa fa-random"></i>Batch VII
                                </a>
                            </li>
                            <li data-menu="">
                                <a class="dropdown-item" href="{{route('batch-8')}}" data-toggle="dropdown" data-i18n="Batch VIII">
                                    <i class="fa fa-random"></i>Batch VIII
                                </a>
                            </li>
                            <li data-menu="">
                                <a class="dropdown-item" href="{{route('batch-9')}}" data-toggle="dropdown" data-i18n="Batch IX">
                                    <i class="fa fa-random"></i>Batch IX
                                </a>
                            </li>
                            <li data-menu="">
                                <a class="dropdown-item" href="{{route('batch-10')}}" data-toggle="dropdown" data-i18n="Batch X">
                                    <i class="fa fa-random"></i>Batch X
                                </a>
                            </li>
                            <li data-menu="">
                                <a class="dropdown-item" href="{{route('batch-11')}}" data-toggle="dropdown" data-i18n="Batch XI">
                                    <i class="fa fa-random"></i>Batch XI
                                </a>
                            </li>
                            <li data-menu="">
                                <a class="dropdown-item" href="{{route('batch-12')}}" data-toggle="dropdown" data-i18n="Batch XII">
                                    <i class="fa fa-random"></i>Batch XII
                                </a>
                            </li>
                            <li data-menu="">
                                <a class="dropdown-item" href="{{route('batch-13')}}" data-toggle="dropdown" data-i18n="Batch XIII">
                                    <i class="fa fa-random"></i>Batch XIII
                                </a>
                            </li>
                            {{-- <li data-menu="">
                                <a class="dropdown-item" href="{{route('batch-14')}}" data-toggle="dropdown" data-i18n="Batch XIV">
                                    <i class="fa fa-random"></i>Batch XIV
                                </a>
                            </li>
                            <li data-menu="">
                                <a class="dropdown-item" href="{{route('batch-15')}}" data-toggle="dropdown" data-i18n="Batch XV">
                                    <i class="fa fa-random"></i>Batch XV
                                </a>
                            </li> --}}
                            <li data-menu="">
                                <a class="dropdown-item" href="{{route('batch-os')}}" data-toggle="dropdown" data-i18n="Batch OS">
                                    <i class="fa fa-random"></i>Batch OS
                                </a>
                            </li>
                            {{-- <li data-menu="">
                                <a class="dropdown-item" href="{{route('batch-16')}}" data-toggle="dropdown" data-i18n="Batch XVI">
                                    <i class="fa fa-random"></i>Batch XVI
                                </a>
                            </li>
                            <li data-menu="">
                                <a class="dropdown-item" href="{{route('batch-17')}}" data-toggle="dropdown" data-i18n="Batch XVII">
                                    <i class="fa fa-random"></i>Batch XVII
                                </a>
                            </li>
                            <li data-menu="">
                                <a class="dropdown-item" href="{{route('batch-18')}}" data-toggle="dropdown" data-i18n="Batch XVIII">
                                    <i class="fa fa-random"></i>Batch XVIII
                                </a>
                            </li> --}}
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2" id="breadcumbs" hidden>
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">@yield('breadcumb')</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    {{-- <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Content</a>
                                    </li>
                                    <li class="breadcrumb-item active">Helper Classes
                                    </li> --}}
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <div class="row">
                        <div class="col">
                            @yield('content')
                        </div>
                    </div>
                </section>
                <!-- Dashboard Analytics end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-absolute footer-light navbar-shadow" aria-disabled="true" >
        <p class="clearfix blue-grey lighten-2 mb-0">
            <span class="float-md-left d-block d-md-inline-block mt-25">
                    Copyrights ©2018-2021.
                <a class="text-bold-800 grey darken-2" href="https://www.wipro-unza.co.id/" target="_blank">
                    Wipro Unza
                </a>All rights Reserved
            </span>
            <span class="float-md-right d-none d-md-block">
                <b>Version</b> V.2.21.0
            </span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->

    @include('master/include/footer')
    <script>
        $(window).on('load', function () {
            setTimeout(function () {
                $('.se-pre-con').fadeOut()
            }, 2000)
        })
    </script>

    @yield('script')

</body>
<!-- END: Body-->
</html>