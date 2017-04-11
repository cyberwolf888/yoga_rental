<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rent It</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('assets/frontend') }}/ico/apple-touch-icon-144-precomposed.png">
    <link rel="shortcut icon" href="{{ url('assets/frontend') }}/ico/favicon.ico">

    <!-- CSS Global -->
    <link href="{{ url('assets/frontend') }}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('assets/frontend') }}/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{ url('assets/frontend') }}/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ url('assets/frontend') }}/plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet">
    <link href="{{ url('assets/frontend') }}/plugins/owl-carousel2/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ url('assets/frontend') }}/plugins/owl-carousel2/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="{{ url('assets/frontend') }}/plugins/animate/animate.min.css" rel="stylesheet">
    <link href="{{ url('assets/frontend') }}/plugins/swiper/css/swiper.min.css" rel="stylesheet">
    <link href="{{ url('assets/frontend') }}/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="{{ url('assets/frontend') }}/css/theme.css" rel="stylesheet">
    <link href="{{ url('assets/frontend') }}/css/theme-red-1.css" rel="stylesheet" id="theme-config-link">

    <!-- Head Libs -->
    <script src="{{ url('assets/frontend') }}/plugins/modernizr.custom.js"></script>

    <!--[if lt IE 9]>
    <script src="{{ url('assets/frontend') }}/plugins/iesupport/html5shiv.js"></script>
    <script src="{{ url('assets/frontend') }}/plugins/iesupport/respond.min.js"></script>
    <![endif]-->
</head>
<body id="home" class="wide">
<!-- PRELOADER -->
<div id="preloader">
    <div id="preloader-status">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
        <div id="preloader-title">Loading</div>
    </div>
</div>
<!-- /PRELOADER -->

<!-- WRAPPER -->
<div class="wrapper">

    <!-- HEADER -->
    <header class="header fixed">
        <div class="header-wrapper">
            <div class="container">

                <!-- Logo -->
                <div class="logo">
                    <a href="index-2.html"><img src="{{ url('assets') }}/backend/layouts/layout4/img/logo-white-small.png" alt="Rent It"/></a>
                </div>
                <!-- /Logo -->

                <!-- Mobile menu toggle button -->
                <a href="#" class="menu-toggle btn btn-theme-transparent"><i class="fa fa-bars"></i></a>
                <!-- /Mobile menu toggle button -->

                <!-- Navigation -->
                <nav class="navigation closed clearfix">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <!-- navigation menu -->
                            <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
                            <ul class="nav sf-menu">
                                <li class="@if (str_is('*.home', Route::currentRouteName())) active @endif"><a href="{{ url('/') }}">Home</a></li>
                                <li class="@if (str_is('*.mobil', Route::currentRouteName())) active @endif"><a href="{{ url('mobil') }}">Mobil</a></li>
                                <li class="@if (str_is('*.motor', Route::currentRouteName())) active @endif"><a href="{{ url('motor') }}">Motor</a></li>
                                <li><a href="{{ url('login') }}">Login</a></li>
                                <li>
                                    <ul class="social-icons">
                                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                    </ul>
                                </li>
                            </ul>
                            <!-- /navigation menu -->
                        </div>
                    </div>
                    <!-- Add Scroll Bar -->
                    <div class="swiper-scrollbar"></div>
                </nav>
                <!-- /Navigation -->

            </div>
        </div>

    </header>
    <!-- /HEADER -->

    <!-- CONTENT AREA -->
    <div class="content-area">
        @yield('content')
    </div>
    <!-- /CONTENT AREA -->

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-meta">
            <div class="container">
                <div class="row">

                    <div class="col-sm-12">
                        <p class="btn-row text-center">
                            <a href="#" class="btn btn-theme btn-icon-left facebook"><i class="fa fa-facebook"></i>FACEBOOK</a>
                            <a href="#" class="btn btn-theme btn-icon-left twitter"><i class="fa fa-twitter"></i>TWITTER</a>
                            <a href="#" class="btn btn-theme btn-icon-left pinterest"><i class="fa fa-pinterest"></i>PINTEREST</a>
                            <a href="#" class="btn btn-theme btn-icon-left google"><i class="fa fa-google"></i>GOOGLE</a>
                        </p>
                        <div class="copyright">&copy; {{ date('Y') }} Rent It — An One Page Rental by Wawan Aditya</div>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <!-- /FOOTER -->

    <div id="to-top" class="to-top"><i class="fa fa-angle-up"></i></div>

</div>
<!-- /WRAPPER -->

<!-- JS Global -->
<script src="{{ url('assets/frontend') }}/plugins/jquery/jquery-1.11.1.min.js"></script>
<script src="{{ url('assets/frontend') }}/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ url('assets/frontend') }}/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="{{ url('assets/frontend') }}/plugins/superfish/js/superfish.min.js"></script>
<script src="{{ url('assets/frontend') }}/plugins/prettyphoto/js/jquery.prettyPhoto.js"></script>
<script src="{{ url('assets/frontend') }}/plugins/owl-carousel2/owl.carousel.min.js"></script>
<script src="{{ url('assets/frontend') }}/plugins/jquery.sticky.min.js"></script>
<script src="{{ url('assets/frontend') }}/plugins/jquery.easing.min.js"></script>
<script src="{{ url('assets/frontend') }}/plugins/jquery.smoothscroll.min.js"></script>
<!--<script src="assets/plugins/smooth-scrollbar.min.js"></script>-->
<script src="{{ url('assets/frontend') }}/plugins/swiper/js/swiper.jquery.min.js"></script>
<script src="{{ url('assets/frontend') }}/plugins/datetimepicker/js/moment-with-locales.min.js"></script>
<script src="{{ url('assets/frontend') }}/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<!-- JS Page Level -->
<script src="{{ url('assets/frontend') }}/js/theme-ajax-mail.js"></script>
<script src="{{ url('assets/frontend') }}/js/theme.js"></script>

</body>
</html>