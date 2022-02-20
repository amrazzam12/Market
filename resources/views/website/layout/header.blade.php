<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/chosen.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/color-01.css')}}">
</head>
<body class="home-page home-01 ">

<!-- mobile menu -->
<div class="mercado-clone-wrap">
    <div class="mercado-panels-actions-wrap">
        <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
    </div>
    <div class="mercado-panels"></div>
</div>
<header id="header" class="header header-style-1">
    <div class="container-fluid">
        <div class="row">
            <div class="topbar-menu-area">
                <div class="container">
                    <div class="topbar-menu left-menu">
                        <ul>
                            <li class="menu-item" >
                                <a title="Hotline: (+123) 456 789" href="#" ><span class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>
                            </li>
                        </ul>
                    </div>
                    <div class="topbar-menu right-menu">
                        <ul>
                            @if(\Illuminate\Support\Facades\Auth::user())
                                <li class="menu-item"style="margin-right: 5px" >{{auth()->user()->name}}</li>
                                @if(auth()->user()->role == 'admin')
                                    <li class="menu-item"><a href="{{url('panel')}}">Dashboard</a></li>
                                @endif
                            <li class="menu-item">
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <button type="submit" style="border: none; background: none">logout</button>
                                </form>
                            </li>


                            @else
                                <li class="menu-item" ><a title="Register or Login" href="{{route('login')}}">Login</a></li>
                                <li class="menu-item" ><a title="Register or Login" href="{{route('register')}}">Register</a></li>
                            @endif

                            <li class="menu-item lang-menu menu-item-has-children parent">
                                <a title="English" href="#"><span class="img label-before"><img src="{{asset('assets/images/lang-en.png')}}" alt="lang-en"></span>English</a>

                            </li>
                            <li class="menu-item menu-item-has-children parent" >
                                <a title="Dollar (USD)" href="#">Dollar (USD)</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="mid-section main-info-area">

                    <div class="wrap-logo-top left-section">
                        <a href="index.html" class="link-to-home"><img src="{{asset('assets/images/logo-top-1.png')}}" alt="mercado"></a>
                    </div>

                    <div class="wrap-search center-section">
                        <div class="wrap-search-form">
                            <form action="#" id="form-search-top" name="form-search-top">
                                <input type="text" name="search" value="" placeholder="Search here...">
                                <button form="form-search-top" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>

                            </form>
                        </div>
                    </div>

                    <div class="wrap-icon right-section">
                        <div class="wrap-icon-section wishlist">
                            <a href="#" class="link-direction">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                                <div class="left-info">
                                    <span class="index">0 item</span>
                                    <span class="title">Wishlist</span>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-icon-section minicart">
                            <a href="{{route('cartWebsite')}}" class="link-direction">
                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                <div class="left-info">
                                    <span class="index">
                                        @if(session()->get('cart') == null) 0 Items
                                        @else
                                            {{count(session()->get('cart'))}} Items
                                        @endif
                                    </span>
                                    <span class="title">CART</span>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-icon-section show-up-after-1024">
                            <a href="#" class="mobile-navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="nav-section header-sticky">
                <div class="header-nav-section">
                    <div class="container">
                        <ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info" >
                            <li class="menu-item"><a href="#" class="link-term">Weekly Featured</a><span class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="{{url('shop' . '?filter=hot')}}" class="link-term">Hot Sale items</a><span class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="{{url('shop' . '?filter=new')}}" class="link-term">Top new items</a><span class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="#" class="link-term">Top Selling</a><span class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="#" class="link-term">Top rated items</a><span class="nav-label hot-label">hot</span></li>
                        </ul>
                    </div>
                </div>

                <div class="primary-nav-section">
                    <div class="container">
                        <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
                            <li class="menu-item home-icon">
                                <a href="{{route('home')}}" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('about_us')}}" class="link-term mercado-item-title">About Us</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('shop')}}" class="link-term mercado-item-title">Shop</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('cartWebsite')}}" class="link-term mercado-item-title">Cart</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('checkout')}}" class="link-term mercado-item-title">Checkout</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('contact-us')}}" class="link-term mercado-item-title">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
