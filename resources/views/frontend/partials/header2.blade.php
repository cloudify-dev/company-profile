<header class="th-header header-layout1">
    <div class="header-top">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                <div class="col-auto d-none d-lg-block">
                    <div class="header-links">
                        <ul>
                            <li><i class="fas fa-map-location"></i>54 NJ-12, Flemington, United States</li>
                            <li><i class="fas fa-phone"></i><a href="tel:+1539873657">+153-987-3657</a></li>
                            <li><i class="fas fa-envelope"></i><a href="mailto:info@webteck.com">info@webteck.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="header-social">
                        <span class="social-title">Follow Us On : </span>
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sticky-wrapper">
        <!-- Main Menu Area -->
        <div class="menu-area">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header-logo">
                            <a class="icon-masking" href="{{ url('/') }}">
                                <span data-mask-src="{{ asset('assets_frontend/assets/img/logo.svg') }}"
                                    class="mask-icon"></span>
                                <img src="{{ asset('assets_frontend/assets/img/logo.svg') }}" alt="Webteck">
                            </a>
                        </div>
                    </div>

                    <div class="col-auto">
                        <nav class="main-menu d-none d-lg-inline-block">
                            <ul>
                                <li class="menu-item-has-children">
                                    <a href="{{ url('/') }}">Home</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ url('/') }}">Digital Agency</a></li>
                                        <li><a href="{{ url('/home-web-development') }}">Web Development</a></li>
                                        <li><a href="{{ url('/home-software-company') }}">Software Company</a></li>
                                        <li><a href="{{ url('/home-startup-company') }}">Startup Company</a></li>
                                        <li><a href="{{ url('/home-it-solution') }}">IT Solution</a></li>
                                        <li><a href="{{ url('/home-web-agency') }}">Web Agency</a></li>
                                        <li><a href="{{ url('/home-sass-landing') }}">Sass Landing</a></li>
                                        <li><a href="{{ url('/home-app-landing') }}">App Landing</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url('/about') }}">About Us</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Services</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ url('/service') }}">Services</a></li>
                                        <li><a href="{{ url('/service-details') }}">Services Details</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Pages</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children">
                                            <a href="#">Shop</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{ url('/shop') }}">Shop</a></li>
                                                <li><a href="{{ url('/shop-details') }}">Shop Details</a></li>
                                                <li><a href="{{ url('/cart') }}">Cart Page</a></li>
                                                <li><a href="{{ url('/checkout') }}">Checkout</a></li>
                                                <li><a href="{{ url('/wishlist') }}">Wishlist</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ url('/team') }}">Team</a></li>
                                        <li><a href="{{ url('/team-details') }}">Team Details</a></li>
                                        <li><a href="{{ url('/project') }}">Project</a></li>
                                        <li><a href="{{ url('/project-details') }}">Project Details</a></li>
                                        <li><a href="{{ url('/gallery') }}">Gallery</a></li>
                                        <li><a href="{{ url('/pricing') }}">Pricing</a></li>
                                        <li><a href="{{ url('/faq') }}">Faq Page</a></li>
                                        <li><a href="{{ url('/error') }}">Error Page</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ url('/blog') }}">Blog</a></li>
                                        <li><a href="{{ url('/blog-details') }}">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url('/contact') }}">Contact</a></li>
                            </ul>
                        </nav>

                        <div class="header-button">
                            <button type="button" class="icon-btn sideMenuToggler d-inline-block d-lg-none">
                                <i class="fal fa-shopping-cart"></i>
                                <span class="badge">5</span>
                            </button>
                            <button type="button" class="th-menu-toggle d-inline-block d-lg-none">
                                <i class="far fa-bars"></i>
                            </button>
                        </div>
                    </div>

                    <div class="col-auto d-none d-lg-block">
                        <div class="header-button">
                            <button type="button" class="icon-btn searchBoxToggler"><i
                                    class="fal fa-search"></i></button>
                            <button type="button" class="icon-btn sideMenuToggler">
                                <i class="fal fa-shopping-cart"></i>
                                <span class="badge">5</span>
                            </button>
                            <a href="{{ url('/contact') }}" class="th-btn style3 shadow-none">Make Appointment
                                <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="logo-bg"></div>
            </div>
        </div>
    </div>
</header>
