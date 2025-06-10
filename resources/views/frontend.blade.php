<!--LANDING PAGE-->
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Webteck - Technology & IT Solutions HTML Template - Startup Company</title>
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

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,700&family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet">

    <!-- All CSS File -->
    <link rel="stylesheet" href="{{ asset('assets_frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_frontend/assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_frontend/assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_frontend/assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_frontend/assets/css/style.css') }}">
</head>

<body>

    @include('frontend.partials.header')
    @yield('content')
    @include('frontend.partials.footer')

    <div class="cursor"></div>
    <div class="cursor2"></div>

    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->



    <!--********************************
   Code Start From Here
 ******************************** -->
    <!--<div class="color-scheme-wrap active">-->
    <!--    <button class="switchIcon"><i class="fa-solid fa-palette"></i></button>-->
    <!--    <h4 class="color-scheme-wrap-title"><i class="far fa-palette me-2"></i>Style Swicher</h4>-->
    <!--    <div class="color-switch-btns">-->
    <!--        <button data-color="#3E66F3"><i class="fa-solid fa-droplet"></i></button>-->
    <!--        <button data-color="#684DF4"><i class="fa-solid fa-droplet"></i></button>-->
    <!--        <button data-color="#008080"><i class="fa-solid fa-droplet"></i></button>-->
    <!--        <button data-color="#323F7C"><i class="fa-solid fa-droplet"></i></button>-->
    <!--        <button data-color="#FC3737"><i class="fa-solid fa-droplet"></i></button>-->
    <!--        <button data-color="#8a2be2"><i class="fa-solid fa-droplet"></i></button>-->
    <!--    </div>-->
    <!--    <a href="https://themeforest.net/user/themeholy" class="th-btn text-center w-100"><i class="fa fa-shopping-cart me-2"></i> Purchase</a>-->
    <!--</div> -->

    <!--==============================
     Preloader
  ==============================-->
    <div id="preloader" class="preloader ">
        <button class="th-btn th-radius preloaderCls">Cancel Preloader </button>
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
    <!--<div class="sidemenu-wrapper ">-->
    <!--    <div class="sidemenu-content">-->
    <!--        <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>-->
    <!--        <div class="widget woocommerce widget_shopping_cart">-->
    <!--            <h3 class="widget_title">Shopping cart</h3>-->
    <!--            <div class="widget_shopping_cart_content">-->
    <!--                <ul class="woocommerce-mini-cart cart_list product_list_widget ">-->
    <!--                    <li class="woocommerce-mini-cart-item mini_cart_item">-->
    <!--                        <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>-->
    <!--                        <a href="#"><img src="assets/img/product/product_thumb_1_1.jpg" alt="Cart Image">Gaming Computer</a>-->
    <!--                        <span class="quantity">1 ×-->
    <!--                            <span class="woocommerce-Price-amount amount">-->
    <!--                                <span class="woocommerce-Price-currencySymbol">$</span>940.00</span>-->
    <!--                        </span>-->
    <!--                    </li>-->
    <!--                    <li class="woocommerce-mini-cart-item mini_cart_item">-->
    <!--                        <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>-->
    <!--                        <a href="#"><img src="assets/img/product/product_thumb_1_2.jpg" alt="Cart Image">Smartphone Vivo V9</a>-->
    <!--                        <span class="quantity">1 ×-->
    <!--                            <span class="woocommerce-Price-amount amount">-->
    <!--                                <span class="woocommerce-Price-currencySymbol">$</span>899.00</span>-->
    <!--                        </span>-->
    <!--                    </li>-->
    <!--                    <li class="woocommerce-mini-cart-item mini_cart_item">-->
    <!--                        <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>-->
    <!--                        <a href="#"><img src="assets/img/product/product_thumb_1_3.jpg" alt="Cart Image">SanDisk Flash Drive</a>-->
    <!--                        <span class="quantity">1 ×-->
    <!--                            <span class="woocommerce-Price-amount amount">-->
    <!--                                <span class="woocommerce-Price-currencySymbol">$</span>756.00</span>-->
    <!--                        </span>-->
    <!--                    </li>-->
    <!--                    <li class="woocommerce-mini-cart-item mini_cart_item">-->
    <!--                        <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>-->
    <!--                        <a href="#"><img src="assets/img/product/product_thumb_1_4.jpg" alt="Cart Image">Smart Power Bank</a>-->
    <!--                        <span class="quantity">1 ×-->
    <!--                            <span class="woocommerce-Price-amount amount">-->
    <!--                                <span class="woocommerce-Price-currencySymbol">$</span>723.00</span>-->
    <!--                        </span>-->
    <!--                    </li>-->
    <!--                    <li class="woocommerce-mini-cart-item mini_cart_item">-->
    <!--                        <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>-->
    <!--                        <a href="#"><img src="assets/img/product/product_thumb_1_5.jpg" alt="Cart Image">Apple Smartwatch</a>-->
    <!--                        <span class="quantity">1 ×-->
    <!--                            <span class="woocommerce-Price-amount amount">-->
    <!--                                <span class="woocommerce-Price-currencySymbol">$</span>1080.00</span>-->
    <!--                        </span>-->
    <!--                    </li>-->
    <!--                </ul>-->
    <!--                <p class="woocommerce-mini-cart__total total">-->
    <!--                    <strong>Subtotal:</strong>-->
    <!--                    <span class="woocommerce-Price-amount amount">-->
    <!--                        <span class="woocommerce-Price-currencySymbol">$</span>4398.00</span>-->
    <!--                </p>-->
    <!--                <p class="woocommerce-mini-cart__buttons buttons btn-wrap">-->
    <!--                    <a href="cart.html" class="th-btn wc-forward">View cart</a>-->
    <!--                    <a href="checkout.html" class="th-btn checkout wc-forward">Checkout</a>-->
    <!--                </p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--<div class="popup-search-box d-none d-lg-block">-->
    <!--    <button class="searchClose"><i class="fal fa-times"></i></button>-->
    <!--    <form action="#">-->
    <!--        <input type="text" placeholder="What are you looking for?">-->
    <!--        <button type="submit"><i class="fal fa-search"></i></button>-->
    <!--    </form>-->
    <!--</div>-->
    <!--==============================
    Mobile Menu
  ============================== -->
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="index.html"><img src="assets/img/logo.svg" alt="Webteck"></a>
            </div>
            <div class="th-mobile-menu">
                <ul>
                    <li class="menu-item-has-children">
                        <a href="index.html">Home</a>
                        <ul class="sub-menu">
                            <li><a href="index.html">Digital Agency</a></li>
                            <li><a href="home-web-development.html">Web Development</a></li>
                            <li><a href="home-software-company.html">Software Company</a></li>
                            <li><a href="home-startup-company.html">Startup Company</a></li>
                            <li><a href="home-it-solution.html">IT Solution</a></li>
                            <li><a href="home-web-agency.html">Web Agency</a></li>
                            <li><a href="home-sass-landing.html">Sass Landing</a></li>
                            <li><a href="home-app-landing.html">App Landing</a></li>
                        </ul>
                    </li>
                    <li><a href="about.html">About Us</a></li>
                    <li class="menu-item-has-children">
                        <a href="#">Services</a>
                        <ul class="sub-menu">
                            <li><a href="service.html">Services</a></li>
                            <li><a href="service-details.html">Services Details</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Pages</a>
                        <ul class="sub-menu">
                            <li class="menu-item-has-children">
                                <a href="#">Shop</a>
                                <ul class="sub-menu">
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="shop-details.html">Shop Details</a></li>
                                    <li><a href="cart.html">Cart Page</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                </ul>
                            </li>
                            <li><a href="team.html">Team</a></li>
                            <li><a href="team-details.html">Team Details</a></li>
                            <li><a href="project.html">Project</a></li>
                            <li><a href="project-details.html">Project Details</a></li>
                            <li><a href="gallery.html">Gallery</a></li>
                            <li><a href="pricing.html">Pricing</a></li>
                            <li><a href="faq.html">Faq Page</a></li>
                            <li><a href="error.html">Error Page</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Blog</a>
                        <ul class="sub-menu">
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>





    <!--==============================
Blog Area
==============================-->
    <!--<section class="bg-top-right overflow-hidden space" id="blog-sec" data-bg-src="assets/img/bg/blog_bg_1.png">-->
    <!--    <div class="container space-bottom">-->
    <!--        <div class="title-area text-center">-->
    <!--            <span class="sub-title">-->
    <!--                <div class="icon-masking me-2">-->
    <!--                    <span class="mask-icon" data-mask-src="assets/img/theme-img/title_shape_1.svg"></span>-->
    <!--                    <img src="assets/img/theme-img/title_shape_1.svg" alt="shape">-->
    <!--                </div>-->
    <!--                NEWS & ARTICLES-->
    <!--            </span>-->
    <!--            <h2 class="sec-title">Get Every Single Update <span class="text-theme">Blog</span></h2>-->
    <!--        </div>-->

    <!--        <div class="slider-area">-->
    <!--            <div class="swiper th-slider has-shadow" id="blogSlider1" data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>-->
    <!--                <div class="swiper-wrapper">-->
    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="blog-card">-->
    <!--                            <div class="blog-img">-->
    <!--                                <img src="assets/img/blog/blog_1_1.jpg" alt="blog image">-->
    <!--                            </div>-->
    <!--                            <div class="blog-content">-->
    <!--                                <div class="blog-meta">-->
    <!--                                    <a href="blog.html"><i class="fal fa-calendar-days"></i>15 Jan, 2024</a>-->
    <!--                                    <a href="blog.html"><i class="fal fa-comments"></i>2 Comments</a>-->
    <!--                                </div>-->
    <!--                                <h3 class="box-title"><a href="blog-details.html">Unsatiable entreaties may collecting Power.</a></h3>-->
    <!--                                <div class="blog-bottom">-->
    <!--                                    <a href="blog.html" class="author"><img src="assets/img/blog/author-1-1.png" alt="avater"> By Themeholy</a>-->
    <!--                                    <a href="blog-details.html" class="line-btn">Read More<i class="fas fa-arrow-right"></i></a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="blog-card">-->
    <!--                            <div class="blog-img">-->
    <!--                                <img src="assets/img/blog/blog_1_2.jpg" alt="blog image">-->
    <!--                            </div>-->
    <!--                            <div class="blog-content">-->
    <!--                                <div class="blog-meta">-->
    <!--                                    <a href="blog.html"><i class="fal fa-calendar-days"></i>16 Jan, 2024</a>-->
    <!--                                    <a href="blog.html"><i class="fal fa-comments"></i>3 Comments</a>-->
    <!--                                </div>-->
    <!--                                <h3 class="box-title"><a href="blog-details.html">Regional Manager & limited time management.</a></h3>-->
    <!--                                <div class="blog-bottom">-->
    <!--                                    <a href="blog.html" class="author"><img src="assets/img/blog/author-1-1.png" alt="avater"> By Themeholy</a>-->
    <!--                                    <a href="blog-details.html" class="line-btn">Read More<i class="fas fa-arrow-right"></i></a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="blog-card">-->
    <!--                            <div class="blog-img">-->
    <!--                                <img src="assets/img/blog/blog_1_3.jpg" alt="blog image">-->
    <!--                            </div>-->
    <!--                            <div class="blog-content">-->
    <!--                                <div class="blog-meta">-->
    <!--                                    <a href="blog.html"><i class="fal fa-calendar-days"></i>17 Jan, 2024</a>-->
    <!--                                    <a href="blog.html"><i class="fal fa-comments"></i>2 Comments</a>-->
    <!--                                </div>-->
    <!--                                <h3 class="box-title"><a href="blog-details.html">What’s the Holding Back the It Solution Industry?</a></h3>-->
    <!--                                <div class="blog-bottom">-->
    <!--                                    <a href="blog.html" class="author"><img src="assets/img/blog/author-1-1.png" alt="avater"> By Themeholy</a>-->
    <!--                                    <a href="blog-details.html" class="line-btn">Read More<i class="fas fa-arrow-right"></i></a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="blog-card">-->
    <!--                            <div class="blog-img">-->
    <!--                                <img src="assets/img/blog/blog_1_4.jpg" alt="blog image">-->
    <!--                            </div>-->
    <!--                            <div class="blog-content">-->
    <!--                                <div class="blog-meta">-->
    <!--                                    <a href="blog.html"><i class="fal fa-calendar-days"></i>19 Jan, 2024</a>-->
    <!--                                    <a href="blog.html"><i class="fal fa-comments"></i>4 Comments</a>-->
    <!--                                </div>-->
    <!--                                <h3 class="box-title"><a href="blog-details.html">Latin derived from Cicero's 1st-century BC</a></h3>-->
    <!--                                <div class="blog-bottom">-->
    <!--                                    <a href="blog.html" class="author"><img src="assets/img/blog/author-1-1.png" alt="avater"> By Themeholy</a>-->
    <!--                                    <a href="blog-details.html" class="line-btn">Read More<i class="fas fa-arrow-right"></i></a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="blog-card">-->
    <!--                            <div class="blog-img">-->
    <!--                                <img src="assets/img/blog/blog_1_1.jpg" alt="blog image">-->
    <!--                            </div>-->
    <!--                            <div class="blog-content">-->
    <!--                                <div class="blog-meta">-->
    <!--                                    <a href="blog.html"><i class="fal fa-calendar-days"></i>15 Jan, 2024</a>-->
    <!--                                    <a href="blog.html"><i class="fal fa-comments"></i>2 Comments</a>-->
    <!--                                </div>-->
    <!--                                <h3 class="box-title"><a href="blog-details.html">Unsatiable entreaties may collecting Power.</a></h3>-->
    <!--                                <div class="blog-bottom">-->
    <!--                                    <a href="blog.html" class="author"><img src="assets/img/blog/author-1-1.png" alt="avater"> By Themeholy</a>-->
    <!--                                    <a href="blog-details.html" class="line-btn">Read More<i class="fas fa-arrow-right"></i></a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="blog-card">-->
    <!--                            <div class="blog-img">-->
    <!--                                <img src="assets/img/blog/blog_1_2.jpg" alt="blog image">-->
    <!--                            </div>-->
    <!--                            <div class="blog-content">-->
    <!--                                <div class="blog-meta">-->
    <!--                                    <a href="blog.html"><i class="fal fa-calendar-days"></i>16 Jan, 2024</a>-->
    <!--                                    <a href="blog.html"><i class="fal fa-comments"></i>3 Comments</a>-->
    <!--                                </div>-->
    <!--                                <h3 class="box-title"><a href="blog-details.html">Regional Manager & limited time management.</a></h3>-->
    <!--                                <div class="blog-bottom">-->
    <!--                                    <a href="blog.html" class="author"><img src="assets/img/blog/author-1-1.png" alt="avater"> By Themeholy</a>-->
    <!--                                    <a href="blog-details.html" class="line-btn">Read More<i class="fas fa-arrow-right"></i></a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="blog-card">-->
    <!--                            <div class="blog-img">-->
    <!--                                <img src="assets/img/blog/blog_1_3.jpg" alt="blog image">-->
    <!--                            </div>-->
    <!--                            <div class="blog-content">-->
    <!--                                <div class="blog-meta">-->
    <!--                                    <a href="blog.html"><i class="fal fa-calendar-days"></i>17 Jan, 2024</a>-->
    <!--                                    <a href="blog.html"><i class="fal fa-comments"></i>2 Comments</a>-->
    <!--                                </div>-->
    <!--                                <h3 class="box-title"><a href="blog-details.html">What’s the Holding Back the It Solution Industry?</a></h3>-->
    <!--                                <div class="blog-bottom">-->
    <!--                                    <a href="blog.html" class="author"><img src="assets/img/blog/author-1-1.png" alt="avater"> By Themeholy</a>-->
    <!--                                    <a href="blog-details.html" class="line-btn">Read More<i class="fas fa-arrow-right"></i></a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="blog-card">-->
    <!--                            <div class="blog-img">-->
    <!--                                <img src="assets/img/blog/blog_1_4.jpg" alt="blog image">-->
    <!--                            </div>-->
    <!--                            <div class="blog-content">-->
    <!--                                <div class="blog-meta">-->
    <!--                                    <a href="blog.html"><i class="fal fa-calendar-days"></i>19 Jan, 2024</a>-->
    <!--                                    <a href="blog.html"><i class="fal fa-comments"></i>4 Comments</a>-->
    <!--                                </div>-->
    <!--                                <h3 class="box-title"><a href="blog-details.html">Latin derived from Cicero's 1st-century BC</a></h3>-->
    <!--                                <div class="blog-bottom">-->
    <!--                                    <a href="blog.html" class="author"><img src="assets/img/blog/author-1-1.png" alt="avater"> By Themeholy</a>-->
    <!--                                    <a href="blog-details.html" class="line-btn">Read More<i class="fas fa-arrow-right"></i></a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                </div>-->
    <!--            </div>-->
    <!--            <button data-slider-prev="#blogSlider1" class="slider-arrow style3 slider-prev"><i class="far fa-arrow-left"></i></button>-->
    <!--            <button data-slider-next="#blogSlider1" class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="container">-->
    <!--        <div class="slider-area text-center">-->
    <!--            <div class="swiper th-slider" data-slider-options='{"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"},"1400":{"slidesPerView":"5"}}}'>-->
    <!--                <div class="swiper-wrapper">-->
    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="brand-box">-->
    <!--                            <img src="assets/img/brand/brand_1_1.png" alt="Brand Logo">-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="brand-box">-->
    <!--                            <img src="assets/img/brand/brand_1_2.png" alt="Brand Logo">-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="brand-box">-->
    <!--                            <img src="assets/img/brand/brand_1_3.png" alt="Brand Logo">-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="brand-box">-->
    <!--                            <img src="assets/img/brand/brand_1_4.png" alt="Brand Logo">-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="brand-box">-->
    <!--                            <img src="assets/img/brand/brand_1_5.png" alt="Brand Logo">-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="brand-box">-->
    <!--                            <img src="assets/img/brand/brand_1_6.png" alt="Brand Logo">-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="brand-box">-->
    <!--                            <img src="assets/img/brand/brand_1_1.png" alt="Brand Logo">-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="brand-box">-->
    <!--                            <img src="assets/img/brand/brand_1_2.png" alt="Brand Logo">-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="brand-box">-->
    <!--                            <img src="assests/img/brand/brand_1_3.png" alt="Brand Logo">-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="brand-box">-->
    <!--                            <img src="assets/img/brand/brand_1_4.png" alt="Brand Logo">-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="brand-box">-->
    <!--                            <img src="assets/img/brand/brand_1_5.png" alt="Brand Logo">-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="brand-box">-->
    <!--                            <img src="assets/img/brand/brand_1_6.png" alt="Brand Logo">-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->

    <!--            </div>-->
    <!--        </div>-->

    <!--    </div>-->
    <!--    <div class="shape-mockup" data-bottom="0" data-left="0">-->
    <!--        <div class="particle-2 small" id="particle-4"></div>-->
    <!--    </div>-->
    <!--</section>-->



    <!--********************************
   Code End  Here
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
    <!-- Scripts -->
    <script src="{{ asset('assets_frontend/assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets_frontend/assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets_frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets_frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets_frontend/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets_frontend/assets/js/circle-progress.js') }}"></script>
    <script src="{{ asset('assets_frontend/assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets_frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets_frontend/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets_frontend/assets/js/tilt.jquery.min.js') }}"></script>
    <script src="{{ asset('assets_frontend/assets/js/gsap.min.js') }}"></script>
    <script src="{{ asset('assets_frontend/assets/js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('assets_frontend/assets/js/smooth-scroll.js') }}"></script>
    <script src="{{ asset('assets_frontend/assets/js/particles.min.js') }}"></script>
    <script src="{{ asset('assets_frontend/assets/js/particles-config.js') }}"></script>
    <script src="{{ asset('assets_frontend/assets/js/main.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("currentYear").textContent = new Date().getFullYear();
        });
    </script>

</body>

</html>
