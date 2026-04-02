<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{!! asset('assets/images/logo/favicon.png') !!}">
    <!-- Title -->
     <link rel="icon" type="image/x-icon" href="{{asset('assets/image/logo/favicon2.png')}}">
    <title>@yield('meta_title')</title>
    <meta name="title" content="@yield('meta_title')">
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keywords')">
    <link rel="canonical" href="@yield('meta_canonical')" />
    @yield('jsonld')
    <!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1713628936036415');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1713628936036415&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/bootstrap.min.css') !!}">
    <!-- simple-line icon -->
    <link rel=" stylesheet" type="text/css" href="{!! asset('assets/css/simple-line-icons.css') !!}">
    <!-- font-awesome icon -->
    <link rel=" stylesheet" type="text/css" href="{!! asset('assets/css/font-awesome.min.css') !!}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- themify icon -->
    <link rel=" stylesheet" type="text/css" href="{!! asset('assets/css/themify-icons.css') !!}">
    <!-- ion icon -->
    <link rel=" stylesheet" type="text/css" href="{!! asset('assets/css/ionicons.min.css') !!}">
    <!-- owl slider -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link rel=" stylesheet" type="text/css" href="{!! asset('assets/css/owl.carousel.min.css') !!}">
    <link rel=" stylesheet" type="text/css" href="{!! asset('assets/css/owl.theme.default.min.css') !!}">
    <!-- swiper -->
    <link rel=" stylesheet" type="text/css" href="{!! asset('assets/css/swiper.min.css') !!}">
    <!-- animation -->
    <link rel=" stylesheet" type="text/css" href="{!! asset('assets/css/animate.css') !!}">
    <!-- style -->
    <link rel=" stylesheet" type="text/css" href="{!! asset('assets/css/style5.css') !!}">
    <link rel=" stylesheet" type="text/css" href="{!! asset('assets/css/responsive5.css') !!}">
    <link rel=" stylesheet" type="text/css" href="{!! asset('assets/css/custom.css') !!}">
    <link rel=" stylesheet" type="text/css" href="{!! asset('assets/css/responsive.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('vendor/mckenziearts/laravel-notify/css/notify.css') !!}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Hand+Pre:wght@400..700&display=swap" rel="stylesheet">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-8J17NQYF3G"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-8J17NQYF3G');
</script>

    <style>
        .f-logo ul.footer-ul li.footer-li {
            width: 100% !important;
        }

        .f-logo,
        .footer-bottom {
            border-top: none !important;
        }

        /* ------------------------------ */

    </style>
    @yield('extracss')

</head>

<body class="home-5">
    {{-- <header class="header">
        <div class="container">
            <div class="logo">
                <a href="{{ route('index') }}">
                    <img src="{!! asset('assets/image/logo/logo.png') !!}" alt="logo" class="img-fluid">
                </a>
            </div>
            <div class="header-menu">
                <ul>
                    <li class="header-menu-link">
                        <a href="{{ route('index') }}">
                            HOME
                        </a>
                    </li>
                    <li class="header-menu-link">
                        <a href="{{ route('index') }}">
                            MATTRESS
                        </a>
                        <ul class="header-menu-sub-link-container">
                            <li class="header-menu-sub-link">
                                <a href="{{ route('index') }}">
                                    LATEX MATTRESS
                                </a>
                                <ul class="header-menu-sub-link-child-container">
                                    <li class="header-menu-sub-link-child">
                                        <a href="{{ route('index') }}">
                                            Orgonopaedic Mattress
                                        </a>
                                    </li>
                                    <li class="header-menu-sub-link-child">
                                        <a href="{{ route('index') }}">
                                            Signature
                                        </a>
                                    </li>
                                    <li class="header-menu-sub-link-child">
                                        <a href="{{ route('index') }}">
                                            7 Zone
                                        </a>
                                    </li>
                                    <li class="header-menu-sub-link-child">
                                        <a href="{{ route('index') }}">
                                            Nature Cool
                                        </a>
                                    </li>
                                    <li class="header-menu-sub-link-child">
                                        <a href="{{ route('index') }}">
                                            Comfort Super Premium
                                        </a>
                                    </li>
                                    <li class="header-menu-sub-link-child">
                                        <a href="{{ route('index') }}">
                                            Nature Ortho
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="header-menu-sub-link">
                                <a href="{{ route('index') }}">
                                    FOAM MATTRESS
                                </a>
                                <ul class="header-menu-sub-link-child-container">
                                    <li class="header-menu-sub-link-child">
                                        <a href="{{ route('index') }}">
                                            Sleep Zone
                                        </a>
                                    </li>
                                    <li class="header-menu-sub-link-child">
                                        <a href="{{ route('index') }}">
                                            Expression
                                        </a>
                                    </li>
                                    <li class="header-menu-sub-link-child">
                                        <a href="{{ route('index') }}">
                                            Ultra Luxury 7 Zone Mattress
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="header-menu-sub-link">
                                <a href="{{ route('index') }}">
                                    SPRING MATTRESS
                                </a>
                                <ul class="header-menu-sub-link-child-container">
                                    <li class="header-menu-sub-link-child">
                                        <a href="{{ route('index') }}">
                                            Comfort Super Premium
                                        </a>
                                    </li>
                                    <li class="header-menu-sub-link-child">
                                        <a href="{{ route('index') }}">
                                            Comfort Premium
                                        </a>
                                    </li>
                                    <li  class="header-menu-sub-link-child">
                                        <a href="{{ route('index') }}">
                                            Comfort Plus
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="header-menu-sub-link">
                                <a href="{{ route('index') }}">
                                    MEMORY MATTRESS
                                </a>
                                <ul class="header-menu-sub-link-child-container">
                                    <li class="header-menu-sub-link-child">
                                        <a href="{{ route('index') }}">
                                            Nature Cool
                                        </a>
                                    </li>
                                    <li  class="header-menu-sub-link-child">
                                        <a href="{{ route('index') }}">
                                            Ultra Deluxe
                                        </a>
                                    </li>
                                    <li  class="header-menu-sub-link-child">
                                        <a href="{{ route('index') }}">
                                            Comfort Premium
                                        </a>
                                    </li>
                                    <li class="header-menu-sub-link-child">
                                        <a href="{{ route('index') }}">
                                            Dr Ortho
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="header-menu-sub-link">
                                <a href="{{ route('index') }}">
                                    ORTHOPEDIC MATTRESS
                                </a>
                                <ul class="header-menu-sub-link-child-container">
                                    <li class="header-menu-sub-link-child">
                                        <a href="{{ route('index') }}">
                                            DR SUPER DELUX
                                        </a>
                                    </li>
                                    <li class="header-menu-sub-link-child">
                                        <a href="{{ route('index') }}">
                                            DR ORTHO MATTRESS
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="header-menu-link">
                        <a href="{{ route('index') }}">
                            ACCOUNT
                        </a>
                        <ul class="header-menu-sub-link-container">
                            <li class="header-menu-sub-link">
                                <a href="{{ route('index') }}">
                                    My Account
                                </a>
                            </li>
                            <li class="header-menu-sub-link">
                                <a href="{{ route('index') }}">
                                    Cart
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="header-menu-link">
                        <a href="{{ route('index') }}">
                            PILLOWS
                        </a>
                        <ul class="header-menu-sub-link-container">
                            <li class="header-menu-sub-link">
                                <a href="{{ route('index') }}">
                                    Latex Pillow
                                </a>
                            </li>
                            <li class="header-menu-sub-link">
                                <a href="{{ route('index') }}">
                                    Memory Pillow
                                </a>
                            </li>
                            <li class="header-menu-sub-link">
                                <a href="{{ route('index') }}">
                                    Fibre Pillow
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--<li class="header-menu-link">-->
                    <!--    <a href="{{ route('index') }}">-->
                    <!--        BLOG-->
                    <!--    </a>-->
                    <!--</li>-->
                </ul>
            </div>
        </div>
    </header> --}}
    <!-- header area start -->
    {{-- hide header code for some time --}}
    <section class="top-5">
        <header class="header-area">
            <div class="header-main-area">
                <div class="container container_WidthMas">
                    <div class="row">
                        <div class="col">
                            <div class="header-main">
                                <div class="header-element logo">
                                    <a href="{{ route('index') }}">
                                        <img src="{!! asset('assets/image/logo/logo.png') !!}" alt="logo" class="img-fluid">
                                    </a>
                                </div>
                                <div class="menu-area">
                                    <div class="header-element header-menu">
                                        <div class="top-menu">
                                            <div class="header-element megamenu-content">
                                                <div class="mainwrap">
                                                    <ul class="main-menu">
                                                        {{-- //static --}}
                                                        <li class="menu-link parent">
                                                            <a href="{{ route('index') }}" class="link-title">
                                                                HOME
                                                            </a>
                                                        </li>
                                                        {!! $dynamiccategoryDesktop !!}
                                                        <li class="menu-link parent">
                                                            <a
                                                                href="{{route('blogs')}}"
                                                                class="link-title">Blogs
                                                                </a>
                                                          
                                                        </li>
                                                        {{-- <!--<li class="menu-link parent">-->
                                                        <!--    <a href="{{ route('blog1') }}" class="link-title">-->
                                                        <!--        BLOG-->
                                                        <!--    </a>-->
                                                        <!--</li>-->
                                                         ===================== --}}

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-element right-block-box">
                                    <ul class="shop-element">
                                        <li class="side-wrap nav-toggler">
                                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                                data-target="#navbarContent">
                                                <span class="line"></span>
                                            </button>
                                        </li>
                                        <li class="side-wrap search-wrap">
                                            <div class="search-rap">
                                                <a href="#search-modal" class="search-popuup"
                                                    data-bs-toggle="modal"><i class="ion-ios-search-strong"></i></a>
                                            </div>
                                        </li>
                                        <li class="side-wrap user-wrap">
                                            <div class="acc-desk">
                                                <div class="user-icon">
                                                    <a href="javascript:void(0)" class="user-icon-desk">
                                                        <span><i class="icon-user"></i></span>
                                                    </a>
                                                </div>
                                                @if (auth('user')->check())
                                                    <div class="user-info">
                                                        <span class="acc-title">
                                                            {{ Str::limit(auth('user')->user()->name, 16, '') }}
                                                        </span>
                                                        <div class="account-login">
                                                            <a href="{{ route('user.dashboard') }}">My Account</a>
                                                            <a href="javascript:void(0)"
                                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                                title="Logout">Logout</a>
                                                            <form id="logout-form" action="{{ route('user.logout') }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="user-info">
                                                        <span class="acc-title">Account</span>
                                                        <div class="account-login">
                                                            <a href="{{ route('user.register') }}">Register</a>
                                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                data-bs-target="#modalLogin">Log in</a>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="acc-mob">
                                                <a href="{{ route('user.dashboard') }}" class="user-icon">
                                                    <span><i class="icon-user"></i></span>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="side-wrap wishlist-wrap">
                                            <a href="javascript:void(0)" class="header-wishlist">
                                                <span class="wishlist-icon"><i class="icon-heart"></i></span>
                                                <span class="wishlist-counter">
                                                    @if (auth()->check())
                                                        {{ count(auth()->user()->wishlists) }}
                                                    @else
                                                        0
                                                    @endif
                                                </span>
                                            </a>
                                        </li>

                                        <li class="side-wrap cart-wrap">
                                            <div class="shopping-widget">
                                                <div class="shopping-cart">
                                                    <a href="javascript:void(0)" class="cart-count">
                                                        <span class="cart-icon-wrap">
                                                            <span class="cart-icon"><i
                                                                    class="icon-handbag"></i></span>
                                                            <span id="cart-total"
                                                                class="bigcounter">{{ Cart::getContent()->count() }}</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </section>
    <!-- header area end -->
    <!-- mobile menu start -->
    <div class="header-bottom-area">
        <div class="main-menu-area">
            <div class="main-navigation navbar-expand-xl">
                <div class="box-header menu-close">
                    <button class="close-box" type="button"><i class="ion-close-round"></i></button>
                </div>
                <div class="navbar-collapse" id="navbarContent">
                    <!-- main-menu start -->
                    <div class="megamenu-content">
                        <div class="mainwrap">
                            <ul class="main-menu">
                                <li class="menu-link">
                                    <a href="{{ route('index') }}" class="link-title">
                                        <span class="sp-link-title">Home</span>
                                    </a>
                                </li>
                                {{-- <li class="menu-link parent">
                                    <a href="javascript:void(0)" class="link-title">
                                        <span class="sp-link-title">Collection</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <a href="#collapse-banner-menu" data-bs-toggle="collapse"
                                        class="link-title link-title-lg">
                                        <span class="sp-link-title">Collection</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-submenu banner-menu collapse" id="collapse-banner-menu">
                                        <li class="menu-banner">
                                            <a href="{{ route('cate', 'namkeens-1') }}" class="menu-banner-img"><img
                                                    src="{!! asset('assets/image/menu-banner01.jpg') !!}" alt="menu-image"
                                                    class="img-fluid"></a>
                                            <a href="{{ route('cate', 'namkeens-1') }}"
                                                class="menu-banner-title"><span>Men
                                                    Shoes</span></a>
                                        </li>
                                        <li class="menu-banner">
                                            <a href="{{ route('cate', 'namkeens-1') }}" class="menu-banner-img"><img
                                                    src="{!! asset('assets/image/menu-banner02.jpg') !!}" alt="menu-image"
                                                    class="img-fluid"></a>
                                            <a href="{{ route('cate', 'namkeens-1') }}"
                                                class="menu-banner-title"><span>Women
                                                    Shoes</span></a>
                                        </li>
                                        <li class="menu-banner">
                                            <a href="{{ route('cate', 'namkeens-1') }}" class="menu-banner-img"><img
                                                    src="{!! asset('assets/image/menu-banner03.jpg') !!}" alt="mneu image"
                                                    class="img-fluid"></a>
                                            <a href="{{ route('cate', 'namkeens-1') }}"
                                                class="menu-banner-title"><span>Accessories</span></a>
                                        </li>
                                    </ul>
                                </li> --}}
                                {!! $dynamiccategoryMobile !!}
                                <li class="menu-link parent">
                                    <a
                                        href="#"
                                        class="link-title">ACCOUNT<i
                                            class="fa fa-angle-down"></i>
                                        </a>
                                    <ul class="dropdown-submenu sub-menu collapse"
                                        id="collapse-mattress">

                                        {{--without grandchild --}}
                                       <li class="submenu-li">
                                            <a class="submenu-link" href="{{ route('user.dashboard') }}">
                                                <span class="mm-text">MY ACCOUNT</span>
                                            </a>
                                        </li>
                                        <li class="submenu-li">
                                            <a class="submenu-link" href="{{ route('cart') }}">
                                                <span class="mm-text">CART</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-link parent">
                                    <a href="{{ route('blogs') }}" class="link-title">
                                        BLOG
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile menu end -->
    <!-- mini cart start -->
    <div class="mini-cart">
        <a href="javascript:void(0)" class="shopping-cart-close"><i class="ion-close-round"></i></a>
        @if (Cart::isEmpty())
            <div class="cart-item-title">
                <p>
                    <span class="cart-count-item bigcounter">Your cart is empty... You can add some product from <a
                            href="/search">here</a></span>
                </p>
            </div>
        @else
            <div class="cart-item-title">
                <p>
                    <span class="cart-count-desc">There are</span>
                    <span class="cart-count-item bigcounter">{{ Cart::getContent()->count() }}</span>
                    <span class="cart-count-desc">Products</span>
                </p>
            </div>
        @endif
        <ul class="cart-item-loop">
            @foreach (Cart::getcontent() as $item)
                <li class="cart-item">
                    <div class="cart-img">
                        <a href="{{ route('product', $item->attributes->slug_url) }}">
                            <img src="{!! asset('storage/images/products/' . $item->attributes->image_url) !!}" alt="cart-image" class="img-fluid">
                        </a>
                    </div>
                    <div class="cart-title">
                        <h6><a href="{{ route('product', $item->attributes->slug_url) }}">{{ $item->name }}</a>
                        </h6>
                        <div class="cart-pro-info">
                            <div class="cart-qty-price">
                                <span class="quantity">{{ $item->quantity }} x </span>
                                <span class="price-box"><i class="fa fa-inr"></i> {{ $item->price }}</span>
                            </div>
                            <div class="delete-item-cart">
                                <a href="javascript:void(0)" class="btn-remove-item"
                                    data-remove-id="{{ $item->id }}"><i class="icon-trash icons"></i></a>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        @if (!Cart::isEmpty())
            <ul class="subtotal-title-area">
                <li class="subtotal-info">
                    <div class="subtotal-titles">
                        <h6>Sub total:</h6>
                        <span class="subtotal-price"><i class="fa fa-inr"></i> {{ Cart::getTotal() }}</span>
                    </div>
                </li>
                <li class="mini-cart-btns">
                    <div class="cart-btns">
                        <a href="{{ route('cart') }}" class="btn btn-style1">View cart</a>
                        <a href="{{ route('checkout') }}" class="btn btn-style1">checkout</a>
                    </div>
                </li>
            </ul>
        @endif
    </div>
    <!-- mini cart end -->
    <!-- search start -->
    <div class="search-model">
        <div class="modal fade" id="search-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('search') }}" method="GET"
                                        class="searchform searchform-3">
                                        <div class="search-content">
                                            <div class="search-engine">
                                                <input name="q" type="text" value="{{ Request::get('q') }}"
                                                    list="suggestion" id="search-box" class="searchform__input"
                                                    autocomplete="off" placeholder="Search by product, category..." />
                                                <button class="search-btn" type="submit"><i
                                                        class="ion-ios-search-strong"></i></button>
                                            </div>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close"><i class="ion-close-round"></i></button>
                                        </div>
                                        <datalist id="suggestion">
                                            @foreach ($keywords as $key)
                                                <option value="{{ $key->keyword }}">
                                            @endforeach
                                            </option>
                                        </datalist>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- search start -->

    @yield('content')
    
    
    
    
    <button type="button" class="btn shop-now-btn vertical-btn enquire-now-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" id="enquireButton">
        Enquire Now
    </button>
    
    <div class="whatsapp-btn bg-success">
        <a href="https://wa.me/919136993014?text=Hi,%20I’d%20like%20to%20inquire%20about%20mattresses." style="margin-bottom: -5px;"><i class="fa-brands fa-whatsapp text-light"></i></a>
    </div>
    <div class="call-btn bg-primary">
        <!--<a href="tel:+919004960057"><i class="fa-solid fa-phone text-light"></i></a>-->
        <a href="tel:+917977461062"><i class="fa-solid fa-phone text-light"></i></a>
    </div>

    <!-- footer start -->
    <section class="footer pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 p-2">
                    <div class="footer-link-heading">
                        MAIN CATEGORIES
                    </div>
                    <ul>
                        <li>
                            <a href="https://comfort-mattress.com/product-category/latex-mattress-42">Latex Mattres
                            </a>
                        </li>
                        <li><a href="https://comfort-mattress.com/product-category/foam-mattress-43">Foam Mattress
                            </a>
                        </li>
                        <li>
                            <a href="https://comfort-mattress.com/product-category/spring-mattress-44">Spring Mattress
                            </a>
                        </li>
                        <li>
                            <a href="https://comfort-mattress.com/product-category/memory-mattress-45">Memory Mattress</a>
                        </li>
                        <div class="footer-link-heading">
                            CONTACT DETAILS
                        </div>
                        
                        <li>
                            <a href="tel:+919136993014">
                                <span class="elementor-icon-list-icon">
                                    <i class="fa-solid fa-phone" style="font-size:14px;"></i>
                                </span>
                                <span class="elementor-icon-list-text">+91 9136993014</span>
                            </a>
                        </li>
                        <li>
                            <a href="tel:+917977461062">
                                <span class="elementor-icon-list-icon">
                                    <i class="fa-solid fa-phone" style="font-size:14px;"></i>
                                </span>
                                <span class="elementor-icon-list-text">+91 7977461062</span>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:info@comfort-mattress.infinityplus1.in">
                                <span class="elementor-icon-list-icon">
                                    <i class="fa-regular fa-envelope"></i>
                                </span>
                                <span class="elementor-icon-list-text">info@comfort-mattress.com</span>
                            </a>
                        </li>
                    </ul>
            
                </div>
                <div class="col-md-3 p-2">
                    <div class="footer-link-heading">
                        BEST PRODUCT
                    </div>
                    <ul>
                        <li>
                            <a href="https://comfort-mattress.com/product/signature-mattress">Signature
                            </a>
                        </li>
                        <li><a href="https://comfort-mattress.com/product/sleep-zone-mattress">Sleep Zone
                            </a>
                        </li>
                        <li>
                            <a href="https://comfort-mattress.com/product/comfort-plus">Comfort Plus
                            </a>
                        </li>
                        <li>
                            <a href="https://comfort-mattress.com/product/nature-cool">Nature Cool</a>
                        </li>
                        <li>
                            <a href="https://comfort-mattress.com/product/dr-ortho">Dr. Ortho</a>
                        </li>
                        <li>
                            <a href="https://comfort-mattress.com/product/dr-super-delux">Orthopedic Mattress</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 p-2">
                    <div class="footer-link-heading">
                        USEFUL LINKS
                    </div>
                    <ul>
                        <li>
                            <a href="{{ route('about') }}">About Us</a>
                        </li>
                        <li><a href="{{ route('contact-us') }}">Contact Us</a>
                        </li>
                        <li>
                            <a href="{{ route('privacy-policy') }}">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="{{ route('terms-conditions') }}">Terms & Condition</a>
                        </li>
                        <li>
                            <a href="{{ route('return-refund-policy') }}">Refund & Return Policy</a>
                        </li>
                        <li>
                            <a href="{{ route('shipping-policy') }}">Shipping Policy</a>
                        </li>
                    </ul>
                    <div class="footer-link-heading">
                        SOCIAL MEDIA
                    </div>
                    <ul class="d-flex gap-3 social-media">
                        <li>
                            <a href="https://www.facebook.com/comfortmattressmumbai" class="mb-0">
                                <i class="fa-brands fa-square-facebook h2 mb-0"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/comfortmattress_/" class="mb-0">
                                <i class="fa-brands fa-square-instagram h2 mb-0"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/@comfortmattress" class="mb-0">
                                <i class="fa-brands fa-square-youtube h2 mb-0"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 p-2">
                    <div class="footer-link-heading">
                        ADDRESS LIST
                    </div>
                    <ul>
                        <li>
                            <div>
                                Main :
                            </div>
                            <address>
                                <a
                                    href="https://www.google.com/maps/place/Comfort+Mattresses/@18.9590258,72.840998,14z/data=!4m5!3m4!1s0x3be7ce249d3b4a97:0x34622a8800bbca4d!8m2!3d18.9529402!4d72.8344171">Comfort
                                    Mattress Commercial Chamber, Yusuf Meher Ali RD, Masjid Bandar West, Masjid Bandar,
                                    MUMBAI, MAHARASHTRA 400003.</a>
                            </address>
                        </li>
                        <li>
                            <div>
                                Branch :
                            </div>
                            <address>
                                <a
                                    href="https://maps.app.goo.gl/BSAc8KvRTDaVX3BE7">Shop no1 symphony building porbo waddo, Calangute North Goa pincode - 403516</a>
                            </address>
                        </li>
                        <li>
                            <a href="tel:+919136604965">
                                <span class="elementor-icon-list-icon">
                                    <i class="fa-solid fa-phone" style="font-size:14px;"></i>
                                </span>
                                <span class="elementor-icon-list-text">+91 91366 04965</span>
                            </a>
                        </li>
                        
                    </ul>
                      
                </div>
                
            </div>
        </div>
    </section>
    <section class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="footer-bottom-left col-md-6">
                    ©2024 Comfort-Mattress. All Rights Reserved.
                </div>
                <div class="footer-bottom-right col-md-6">
                    DESIGNED & DEVELOPED BY <a href="https://sanjaresolutions.com/" style="color: white;  text-decoration: underline;">Sanjar E Solutions</a>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="modalLogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h6>Login</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body p-0">
                    <div class="signUp-page signUp-minimal p-0">
                        <div class="signin-form-wrapper border-0">
                            <!-- <div class="title-area text-center">
                                    <h3>Login.</h3>
                                </div>  -->
                            <form id="login-form" action="/myaccount/login" method="POST" autocomplete="off"
                                class="login">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-group">
                                            <input type="text" name="email" value="{{ old('email') }}"
                                                required />
                                            <label>Email *</label>
                                        </div>
                                        <!-- /.input-group -->
                                    </div>
                                    <!-- /.col- -->
                                    <div class="col-12">
                                        <div class="input-group">
                                            <input type="password" name="password" required />
                                            <label>Password *</label>
                                        </div>
                                        <!-- /.input-group -->
                                    </div>
                                    <!-- /.col- -->
                                </div>
                                <!-- /.row -->
                                <div class="agreement-checkbox d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}
                                            checked id="remember">
                                        <label for="remember">Remember Me</label>
                                    </div>
                                </div>
                                <button type="submit" class="line-button-one button-rose button_update_login">
                                    Login
                                </button>
                            </form>
                            <p class="signUp-text text-center">
                                Don’t have any account?
                                <a href="{{ route('user.register') }}">Register</a> now. &
                                <a href="{{ route('user.login.otp') }}"> Login With Otp</a>
                            </p>
                            <p class="or-text"><span>or</span></p>
                            <ul class="social-icon-wrapper row">
                                <li class="col-12">
                                    <a href="{{ route('user.auth.socialite', 'google') }}" class="gmail"><i
                                            class="fa fa-envelope-o" aria-hidden="true"></i>
                                        Gmail</a>
                                </li>
                                <li class="col-12">
                                    <a href="{{ route('user.auth.socialite', 'facebook') }}" class="facebook"><i
                                            class="fa-brands fa-facebook-f" aria-hidden="true"></i>
                                        Facebook</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.sign-up-form-wrapper -->
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="d-flex bg-white border border-danger border-5">
                <!--<div class="modal-image-container">-->
                <!--    <img src="{!! asset('assets/image/card-image/enquiry-form-bed.png') !!}" alt="">-->
                        <!--<img src="https://placehold.co/500x526" alt="">-->
                    <!--<div class="position-absolute top-0 left-0">-->
                    <!--</div>-->
                <!--</div>-->
                <div class="modal-content rounded-0 border-0" >
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enquiry Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                     <form action="{{ route('mail') }}" method="post" class="modal-body pb-0">
                        @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone no.</label>
                                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone no">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" name="message" id="message" rows="3" placeholder="Message"></textarea>
                            </div>
                            <div class="mb-3">
                                <div class="g-recaptcha mb-5" style="transform:scale(0.77);-webkit-transform:scale(0.88);transform-origin:0 0;-webkit-transform-origin:0 0;" data-sitekey="6LeoZPsqAAAAAFfWf3hqreMIrKwSCja8gvSavudS"></div>
                            </div>
                             <div class="modal-footer pt-0 border-0">
                            <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
                            <button type="submit" class="btn shop-now-btn mx-auto">Submit</button>
                        </div>
                    </form>
                   
                </div>
            </div>
          </div>
    </div>
    

    @include('frontend.forms')
    <!-- copyright end -->
    <a href="javascript:void(0)" class="scroll" id="top">
        <span><i class="fa fa-angle-double-up"></i></span>
    </a>
    <!-- back to top end -->
    <div class="mm-fullscreen-bg"></div>
    <!-- jquery -->
    <script src="{!! asset('assets/js/modernizr-2.8.3.min.js') !!}"></script>
    <script src="{!! asset('assets/js/jquery-3.6.0.min.js') !!}"></script>
    <!-- bootstrap -->
    <script src="{!! asset('assets/js/bootstrap.min.js') !!}"></script>
    <!-- popper -->
    <script src="{!! asset('assets/js/popper.min.js') !!}"></script>
    <!-- fontawesome -->
    <script src="{!! asset('assets/js/fontawesome.min.js') !!}"></script>
    <!-- owl carousal -->
    {{-- <script src="{!! asset('assets/js/owl.carousel.min.js') !!}"></script> --}}
    <!-- swiper -->
    <script src="{!! asset('assets/js/swiper.min.js') !!}"></script>
    <!-- custom -->
    <script src="{!! asset('assets/js/imagesloaded.pkgd.min.js') !!}"></script>
    <script src="{!! asset('assets/js/jquery.isotope.min.js') !!}"></script>
    <script src="{!! asset('assets/js/jquery.validate.min.js') !!}"></script>
    <script src="{!! asset('assets/js/custom.js') !!}"></script>
    <script src="{!! asset('assets/js/main.js') !!}"></script>


    <!-- owl carousal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


@yield('extrajs')
    @include('notify::messages')
    <script type="text/javascript" src="{!! asset('vendor/mckenziearts/laravel-notify/js/notify.js') !!}"></script>
    <script>
        let modalOpenedByUser = false;

        document.getElementById('enquireButton').addEventListener('click', function() {
            modalOpenedByUser = true;
        });


        // window.onload = function() {
        //     setTimeout(function() {
        //         if (!modalOpenedByUser) {  
        //             var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
        //             myModal.show();
        //         }
        //     }, 10000); 
        // };
    </script>


</body>


</html>
