<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Webteck - Technology & IT Solutions HTML Template - Our Projects</title>
    <meta name="author" content="Themeholy">
    <meta name="description" content="Webteck - Technology & IT Solutions HTML Template">
    <meta name="keywords" content="Webteck - Technology & IT Solutions HTML Template">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57"
        href="{{ asset('assets_frontend/assets/img/favicons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60"
        href="{{ asset('assets_frontend/assets/img/favicons/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72"
        href="{{ asset('assets_frontend/assets/img/favicons/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76"
        href="{{ asset('assets_frontend/assets/img/favicons/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114"
        href="{{ asset('assets_frontend/assets/img/favicons/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120"
        href="{{ asset('assets_frontend/assets/img/favicons/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144"
        href="{{ asset('assets_frontend/assets/img/favicons/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152"
        href="{{ asset('assets_frontend/assets/img/favicons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('assets_frontend/assets/img/favicons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('assets_frontend/assets/img/favicons/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('assets_frontend/assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96"
        href="{{ asset('assets_frontend/assets/img/favicons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('assets_frontend/assets/img/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets_frontend/assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage"
        content="{{ asset('assets_frontend/assets/img/favicons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
        Google Fonts
    ==============================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,700&family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet">

    <!--==============================
        All CSS Files
    ==============================-->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets_frontend/assets/css/bootstrap.min.css') }}">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset('assets_frontend/assets/css/fontawesome.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('assets_frontend/assets/css/magnific-popup.min.css') }}">
    <!-- Swiper Slider -->
    <link rel="stylesheet" href="{{ asset('assets_frontend/assets/css/swiper-bundle.min.css') }}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets_frontend/assets/css/style.css') }}">

    @stack('styles')
</head>


<body>

    @include('frontend.partials.header2')
    @yield('content')
    @include('frontend.partials.footer2')

    <div class="cursor"></div>
    <div class="cursor2"></div>


    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->



    <!--********************************
   Code Start From Here
 ******************************** -->

    <div class="color-scheme-wrap active">
        <button class="switchIcon"><i class="fa-solid fa-palette"></i></button>
        <h4 class="color-scheme-wrap-title"><i class="far fa-palette me-2"></i>Style Swicher</h4>
        <div class="color-switch-btns">
            <button data-color="#3E66F3"><i class="fa-solid fa-droplet"></i></button>
            <button data-color="#684DF4"><i class="fa-solid fa-droplet"></i></button>
            <button data-color="#008080"><i class="fa-solid fa-droplet"></i></button>
            <button data-color="#323F7C"><i class="fa-solid fa-droplet"></i></button>
            <button data-color="#FC3737"><i class="fa-solid fa-droplet"></i></button>
            <button data-color="#8a2be2"><i class="fa-solid fa-droplet"></i></button>
        </div>
        <a href="https://themeforest.net/user/themeholy" class="th-btn text-center w-100">
            <i class="fa fa-shopping-cart me-2"></i> Purchase
        </a>
    </div>

    <!--==============================
     Preloader
  ==============================-->
    <div id="preloader" class="preloader ">
        <button class="th-btn th-radius preloaderCls">Cancel Preloader</button>
        <div id="loader" class="th-preloader">
            <div class="animation-preloader">
                <div class="txt-loading">
                    <span preloader-text="C" class="characters">C</span>
                    <span preloader-text="L" class="characters">L</span>
                    <span preloader-text="O" class="characters">O</span>
                    <span preloader-text="U" class="characters">U</span>
                    <span preloader-text="D" class="characters">D</span>
                    <span preloader-text="I" class="characters">I</span>
                    <span preloader-text="F" class="characters">F</span>
                    <span preloader-text="Y" class="characters">Y</span>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
    Sidemenu
============================== -->
    <div class="sidemenu-wrapper">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget woocommerce widget_shopping_cart">
                <h3 class="widget_title">Shopping cart</h3>
                <div class="widget_shopping_cart_content">
                    <ul class="woocommerce-mini-cart cart_list product_list_widget">
                        @for ($i = 1; $i <= 5; $i++)
                            <li class="woocommerce-mini-cart-item mini_cart_item">
                                <a href="#" class="remove remove_from_cart_button"><i
                                        class="far fa-times"></i></a>
                                <a href="#"><img
                                        src="{{ asset('assets_frontend/assets/img/product/product_thumb_1_' . $i . '.jpg') }}"
                                        alt="Cart Image">Sample Product</a>
                                <span class="quantity">1 ×
                                    <span class="woocommerce-Price-amount amount">
                                        <span
                                            class="woocommerce-Price-currencySymbol">$</span>{{ 700 + $i * 50 }}.00</span>
                                </span>
                            </li>
                        @endfor
                    </ul>
                    <p class="woocommerce-mini-cart__total total">
                        <strong>Subtotal:</strong>
                        <span class="woocommerce-Price-amount amount">
                            <span class="woocommerce-Price-currencySymbol">$</span>4398.00</span>
                    </p>
                    <p class="woocommerce-mini-cart__buttons buttons btn-wrap">
                        <a href="{{ url('cart') }}" class="th-btn wc-forward">View cart</a>
                        <a href="{{ url('checkout') }}" class="th-btn checkout wc-forward">Checkout</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Search -->
    <div class="popup-search-box d-none d-lg-block">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="#">
            <input type="text" placeholder="What are you looking for?">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>

    <!--==============================
    Mobile Menu
============================== -->
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="{{ url('/') }}"><img src="{{ asset('assets_frontend/assets/img/logo.svg') }}"
                        alt="Webteck"></a>
            </div>
            <div class="th-mobile-menu">
                <ul>
                    <li class="menu-item-has-children">
                        <a href="{{ url('/') }}">Home</a>
                        <ul class="sub-menu">
                            <li><a href="{{ url('/') }}">Digital Agency</a></li>
                            <li><a href="{{ url('home-web-development') }}">Web Development</a></li>
                            <li><a href="{{ url('home-software-company') }}">Software Company</a></li>
                            <li><a href="{{ url('home-startup-company') }}">Startup Company</a></li>
                            <li><a href="{{ url('home-it-solution') }}">IT Solution</a></li>
                            <li><a href="{{ url('home-web-agency') }}">Web Agency</a></li>
                            <li><a href="{{ url('home-sass-landing') }}">Sass Landing</a></li>
                            <li><a href="{{ url('home-app-landing') }}">App Landing</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('about') }}">About Us</a></li>
                    <li class="menu-item-has-children">
                        <a href="#">Services</a>
                        <ul class="sub-menu">
                            <li><a href="{{ url('service') }}">Services</a></li>
                            <li><a href="{{ url('service-details') }}">Services Details</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Pages</a>
                        <ul class="sub-menu">
                            <li class="menu-item-has-children">
                                <a href="#">Shop</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ url('shop') }}">Shop</a></li>
                                    <li><a href="{{ url('shop-details') }}">Shop Details</a></li>
                                    <li><a href="{{ url('cart') }}">Cart Page</a></li>
                                    <li><a href="{{ url('checkout') }}">Checkout</a></li>
                                    <li><a href="{{ url('wishlist') }}">Wishlist</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('team') }}">Team</a></li>
                            <li><a href="{{ url('team-details') }}">Team Details</a></li>
                            <li><a href="{{ url('project') }}">Project</a></li>
                            <li><a href="{{ url('project-details') }}">Project Details</a></li>
                            <li><a href="{{ url('gallery') }}">Gallery</a></li>
                            <li><a href="{{ url('pricing') }}">Pricing</a></li>
                            <li><a href="{{ url('faq') }}">Faq Page</a></li>
                            <li><a href="{{ url('error') }}">Error Page</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Blog</a>
                        <ul class="sub-menu">
                            <li><a href="{{ url('blog') }}">Blog</a></li>
                            <li><a href="{{ url('blog-details') }}">Blog Details</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('contact') }}">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!--********************************
   Code End Here
 ******************************** -->

    <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg>
    </div>

    <!--==============================
    All Js File
============================== -->
    <!-- Jquery -->
    <script src="{{ asset('assets_frontend/assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <!-- Swiper Slider -->
    <script src="{{ asset('assets_frontend/assets/js/swiper-bundle.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets_frontend/assets/js/bootstrap.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('assets_frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Counter Up -->
    <script src="{{ asset('assets_frontend/assets/js/jquery.counterup.min.js') }}"></script>
    <!-- Circle Progress -->
    <script src="{{ asset('assets_frontend/assets/js/circle-progress.js') }}"></script>
    <!-- Range Slider -->
    <script src="{{ asset('assets_frontend/assets/js/jquery-ui.min.js') }}"></script>
    <!-- Isotope Filter -->
    <script src="{{ asset('assets_frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets_frontend/assets/js/isotope.pkgd.min.js') }}"></script>
    <!-- Tilt JS -->
    <script src="{{ asset('assets_frontend/assets/js/tilt.jquery.min.js') }}"></script>
    <!-- GSAP -->
    <script src="{{ asset('assets_frontend/assets/js/gsap.min.js') }}"></script>
    <!-- ScrollTrigger -->
    <script src="{{ asset('assets_frontend/assets/js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('assets_frontend/assets/js/smooth-scroll.js') }}"></script>
    <!-- Particles JS -->
    <script src="{{ asset('assets_frontend/assets/js/particles.min.js') }}"></script>
    <script src="{{ asset('assets_frontend/assets/js/particles-config.js') }}"></script>
    <!-- Main Js File -->
    <script src="{{ asset('assets_frontend/assets/js/main.js') }}"></script>

</body>

</html>
