<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Karma Store</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')

    <link rel="shortcut icon" href="/img/fav.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/linearicons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" rel="stylesheet">
    <link href="{{ asset('css/nouislider.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ion.rangeSlider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ion.rangeSlider.skinFlat.css') }}" rel="stylesheet">
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

<!-- Start Header Area -->
<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">

                <a class="navbar-brand logo_h" href="{{ route('home') }}"><img src="/img/logo.png" alt=""></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">

                        <li class="nav-item {{ (request()->routeIs('home')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('home') }}">Home</a></li>

                        <li class="nav-item {{ (request()->routeIs('shop.products.index')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('shop.products.index') }}">Shop</a></li>

                        <li class="nav-item submenu dropdown {{ (request()->routeIs('blog.posts.all')) ? 'active' : '' }}">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">Blog</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item {{ (request()->routeIs('blog.posts.all')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('blog.posts.all') }}">All posts</a></li>
                                <li class="nav-item {{ (request()->routeIs('blog.posts.best')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('blog.posts.best') }}">Best posts</a></li>
                                <li class="nav-item {{ (request()->routeIs('blog.posts.popular')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('blog.posts.popular') }}">Popular posts</a></li>
                            </ul>
                        </li>

                        <li class="nav-item submenu dropdown {{ (request()->routeIs('page')) ? 'active' : '' }}">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">Pages</a>
                            <ul class="dropdown-menu">
                                @foreach (array_slice($menuPages, 0, 3) as $page)
                                    <li class="nav-item"><a class="nav-link" href="{{ route('page', page_path($page)) }}">{{ $page->getMenuTitle() }}</a></li>
                                @endforeach

                                @if ($morePages = array_slice($menuPages, 3))
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            More... <span class="caret"></span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @foreach ($morePages as $page)
                                                <a class="dropdown-item" href="{{ route('page', page_path($page)) }}">{{ $page->getMenuTitle() }}</a>
                                            @endforeach
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </li>

                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">User</a>
                            <ul class="dropdown-menu">
                                @guest
                                    <li class="nav-item {{ (request()->routeIs('login')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                                    <li class="nav-item {{ (request()->routeIs('register')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                                @else
                                    <li class="nav-item {{ (request()->routeIs('cabinet.home')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('cabinet.home') }}">Cabinet</a></li>
                                    <li class="nav-item">
                                        <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" role="button" class="nav-link">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                @endguest
                            </ul>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>

                        @can ('admin-panel')
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.home') }}">Manage</a></li>
                        @endcan
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        {{ Widget::run(\App\Widget\Shop\CartWidget::class) }}
                        <li class="nav-item">
                            <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container">
            <form class="d-flex justify-content-between" method="GET" action="">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here" name="q">
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
<!-- End Header Area -->

@include ('layouts.partials.flash')

@yield('content')

<!-- start footer Area -->
<footer class="footer-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>About Us</h6>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                        ut labore dolore
                        magna aliqua.
                    </p>
                </div>
            </div>
            <div class="col-lg-4  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Newsletter</h6>
                    <p>Stay update with our latest</p>

                    <div id="mc_embed_signup">
                        <form novalidate="true" method="POST" action="{{ route('newsletter.email.add') }}" class="form-inline">
                            @csrf
                            <div class="d-flex flex-row">
                                <input class="form-control" name="email" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
                                <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                            </div>
                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="single-footer-widget mail-chimp">
                    <h6 class="mb-20">Instragram Feed</h6>
                    <ul class="instafeed d-flex flex-wrap">
                        <li><img src="/img/i1.jpg" alt=""></li>
                        <li><img src="/img/i2.jpg" alt=""></li>
                        <li><img src="/img/i3.jpg" alt=""></li>
                        <li><img src="/img/i4.jpg" alt=""></li>
                        <li><img src="/img/i5.jpg" alt=""></li>
                        <li><img src="/img/i6.jpg" alt=""></li>
                        <li><img src="/img/i7.jpg" alt=""></li>
                        <li><img src="/img/i8.jpg" alt=""></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Follow Us</h6>
                    <p>Let us be social</p>
                    <div class="footer-social d-flex align-items-center">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
        <p class="footer-text m-0">
            Copyright ©<script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script><script type="text/javascript">document.write(new Date().getFullYear());</script>2019 All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
        </p>
        </div>
    </div>
</footer>
<!-- End footer Area -->

<script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

<script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/jquery.sticky.js') }}"></script>
<script src="{{ asset('js/nouislider.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="{{ asset('js/gmaps.min.js') }}"></script>

<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/like.js') }}"></script>

@yield ('script')

</body>
</html>
