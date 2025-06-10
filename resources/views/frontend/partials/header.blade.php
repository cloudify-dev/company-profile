<!--==============================
    Header Area
==============================-->
<header class="th-header header-layout6">
    <div class="sticky-wrapper">
        <!-- Main Menu Area -->
        <div class="menu-area">
            <div class="container th-container4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header-logo">
                            <a class="icon-masking" href="{{ url('/index') }}">
                                <span data-mask-src="{{ asset('assets_frontend/assets/img/logo.svg') }}"
                                    class="mask-icon"></span>
                                <img src="{{ asset('assets_frontend/assets/img/logo.svg') }}" alt="Webteck">
                            </a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <nav class="main-menu style2 d-none d-lg-inline-block">
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
                                <li>
                                    <a href="{{ url('contact') }}">Contact</a>
                                </li>
                            </ul>
                        </nav>
                        <button type="button" class="th-menu-toggle d-block d-lg-none">
                            <i class="far fa-bars"></i>
                        </button>
                    </div>
                    <div class="col-auto d-xl-block d-none">
                        <div class="header-button">
                            <a href="tel:+2586232325" class="th-btn style-radius">Call us: +258 6232 3258</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
