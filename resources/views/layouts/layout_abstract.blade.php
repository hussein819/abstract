<!DOCTYPE html>
<!--[if IE 8 ]>
<html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]>
<html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
  ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">


    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- favicons
     ================================================== -->
    {{--
    <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon">
    <link rel="icon" href="public/favicon.ico" type="image/x-icon">--}}

</head>

<body id="top">

<!-- header
================================================== -->
<header class="short-header">

    <div class="gradient-block"></div>

    <div class="row header-content">

        <div class="logo">
            <a href="{{ route('advertise.home') }}">Author</a>
        </div>

        <nav id="main-nav-wrap">
            <ul class="main-navigation sf-menu">
                <li><a href="{{ route('advertise.home') }}" title="">Home</a></li>
                <li class="has-children">
                    <a href="{{ route('advertise.category') }}" title="">Categories</a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('advertise.category') }}">Wordpress</a></li>
                        <li><a href="{{ route('advertise.category') }}">HTML</a></li>
                        <li><a href="{{ route('advertise.category') }}">Photography</a></li>
                        <li><a href="{{ route('advertise.category') }}">UI</a></li>
                        <li><a href="{{ route('advertise.category') }}">Mockups</a></li>
                        <li><a href="{{ route('advertise.category') }}">Branding</a></li>
                    </ul>
                </li>
                <li class="has-children">

                    <ul class="sub-menu">
                        <li><a href="{{ route('advertise.gallery') }}">Gallery Post</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('advertise.guide') }}" title="">Styles</a></li>
                <li><a href="{{ route('advertise.about') }}" title="">About</a></li>
                <li><a href="{{ route('contact.create') }}" title="">Contact</a></li>
                <li><a href="{{ route('control.show') }}" title="">Control</a></li>
            </ul>
        </nav> <!-- end main-nav-wrap -->

        <div class="search-wrap">

            <form role="search" method="get" class="search-form" action="{{ route('advertise.search') }}">
                @csrf
                <label>
                    <span class="hide-content">Search for:</span>
                    <input type="search" class="search-field" placeholder="Type Your Keywords" value="" name="q"
                           title="Search for:" autocomplete="off">
                </label>
                <input type="submit" class="search-submit" value="Search">
            </form>
            <a href="{{ redirect()->back() }}" id="close-search" class="close-btn">Close</a>

        </div> <!-- end search wrap -->

        <div class="triggers">
            <a class="search-trigger" href="#"><i class="fa fa-search"></i></a>
            <a class="menu-toggle" href="#"><span>Menu</span></a>
        </div> <!-- end triggers -->

    </div>

</header> <!-- end header -->
<main class="py-4">
    <div class="container">
        @if (session()->has('message'))
            <div class="alert alert-success container mt-2 mb-2" role="alert"
                 style="width: 730px; text-align: center">
                <strong>successfully
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle-fill"
                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                </strong>
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger container mt-2 mb-2" style="width: 730px; text-align: center">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
            </div>
        @endif
    </div>
    @yield('content')
</main>

<!-- footer
================================================== -->
<footer>

    <div class="footer-main">

        <div class="row">

            <div class="col-four tab-full mob-full footer-info">

                <h4>About Our Site</h4>

                <p>
                    Lorem ipsum Ut velit dolor Ut labore id fugiat in ut fugiat nostrud qui in dolore commodo eu
                    magna Duis cillum dolor officia esse mollit proident Excepteur exercitation nulla. Lorem ipsum
                    In reprehenderit commodo aliqua irure labore.
                </p>

            </div> <!-- end footer-info -->

            <div class="col-two tab-1-3 mob-1-2 site-links">

                <h4>Site Links</h4>

                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>

            </div> <!-- end site-links -->

            <div class="col-two tab-1-3 mob-1-2 social-links">

                <h4>Social</h4>

                <ul>
                    <li><a href="https://twitter.com/HusseinSim">Twitter</a></li>
                    <li><a href="https://www.facebook.com/hussein.sim.37">Facebook</a></li>
                    <li><a href="https://myaccount.google.com/?utm_source=OGB&tab=wk&utm_medium=app">Google+</a>
                    </li>
                    <li><a href="https://www.instagram.com/hussein.sim87/?hl=en">Instagram</a></li>
                </ul>

            </div> <!-- end social links -->

            <div class="col-four tab-1-3 mob-full footer-subscribe">

                <h4>Subscribe</h4>

                <p>Keep yourself updated. Subscribe to our newsletter.</p>

                <div class="subscribe-form">

                    <form id="mc-form" class="group" novalidate="true">

                        <input type="email" value="" name="dEmail" class="email" id="mc-email"
                               placeholder="Type &amp; press enter" required="">

                        <input type="submit" name="subscribe">

                        <label for="mc-email" class="subscribe-message"></label>

                    </form>

                </div>

            </div> <!-- end subscribe -->

        </div> <!-- end row -->

    </div> <!-- end footer-main -->

    <div class="footer-bottom">
        <div class="row">

            <div class="col-twelve">
                <div class="copyright">
                    <span>© Copyright Abstract 2016</span>
                    <span>Design by <a href="http://www.styleshout.com/">styleshout</a></span>
                </div>

                <div id="go-top">
                    <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon icon-arrow-up"></i></a>
                </div>
            </div>

        </div>
    </div> <!-- end footer-bottom -->

</footer>

<div id="preloader">
    <div id="loader"></div>
</div>

<!-- Java Script
================================================== -->
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/main.js"></script>

</body>

</html>
