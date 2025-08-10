@extends('frontend')

@section('content')
    <!--==============================
                                                                                                            Hero Area
                                                                                                        ==============================-->
    <div class="th-hero-wrapper hero-2" id="hero">
        <div class="slider-area">
            <div class="swiper th-slider hero-slider-2" id="heroSlider2"
                data-slider-options='{"autoHeight":"true","effect":"fade","breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"1"},"1200":{"slidesPerView":"1"}}}'>
                <div class="swiper-wrapper">
                    @foreach ($slides as $slide)
                        <div class="swiper-slide">
                            <div class="th-hero-slide">
                                <div class="th-hero-bg" data-bg-src="{{ asset('storage/' . $slide->image) }}"></div>
                                <div class="container">
                                    <div class="hero-style2">
                                        <div class="ripple-shape">
                                            <span class="ripple-1"></span><span class="ripple-2"></span><span
                                                class="ripple-3"></span>
                                            <span class="ripple-4"></span><span class="ripple-5"></span><span
                                                class="ripple-6"></span>
                                        </div>
                                        <span class="hero-subtitle" data-ani="slideinleft" data-ani-delay="0.1s">
                                            {{ $slide->subtitle }}
                                        </span>
                                        <h1 class="hero-title" data-ani="slideinleft" data-ani-delay="0.3s">
                                            {{ $slide->title_1 }}</h1>
                                        <h1 class="hero-title" data-ani="slideinleft" data-ani-delay="0.5s">
                                            {{ $slide->title_2 }}</h1>
                                        <p class="hero-text" data-ani="slideinleft" data-ani-delay="0.7s">
                                            {{ $slide->description }}</p>
                                        <div class="btn-group" data-ani="slideinleft" data-ani-delay="0.9s">
                                            <a href="{{ url('about') }}" class="th-btn style3">DISCOVER MORE<i
                                                    class="fa-regular fa-arrow-right ms-2"></i></a>
                                            <a href="{{ url('contact') }}" class="th-btn style2">CONTACT US<i
                                                    class="fa-regular fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <button data-slider-prev="#heroSlider2" class="slider-arrow style3 slider-prev"><i
                    class="far fa-arrow-left"></i></button>
            <button data-slider-next="#heroSlider2" class="slider-arrow style3 slider-next"><i
                    class="far fa-arrow-right"></i></button>
        </div>

        <div class="hero-shape1">
        </div>

        <!--<div class="hero-shape2">-->
        <!--    <img src="assets/img/hero/hero_shape_2_2.png" alt="shape">-->
        <!--</div>-->
        <!--<div class="hero-shape3">-->
        <!--    <img src="assets/img/hero/hero_shape_2_3.png" alt="shape">-->
        <!--</div>-->
    </div>
    <!--======== / Hero Section ========-->

    <!--==============================
                                                                                                                Servce Area
                                                                                                                ==============================-->
    <!--<section class="space-top">-->
    <!--    <div class="container z-index-common">-->
    <!--        <div class="slider-area">-->
    <!--            <div class="swiper th-slider has-shadow" data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"3"}}}'>-->
    <!--                <div class="swiper-wrapper">-->
    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="service-featured">-->
    <!--                            <div class="service-featured_content">-->
    <!--                                <div class="shape-icon">-->
    <!--                                    <img src="assets/img/icon/service_featured_1.svg" alt="Icon">-->
    <!--                                    <span class="dots"></span>-->
    <!--                                </div>-->
    <!--                                <h3 class="box-title"><a href="service-details.html">IT Management</a></h3>-->
    <!--                                <p class="service-featured_text">Conveniently promote transparent materials and stand-alone strategic theme areas.</p>-->
    <!--                                <a href="service-details.html" class="icon-btn"><i class="fa-regular fa-arrow-right"></i></a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="service-featured">-->
    <!--                            <div class="service-featured_content">-->
    <!--                                <div class="shape-icon">-->
    <!--                                    <img src="assets/img/icon/service_featured_2.svg" alt="Icon">-->
    <!--                                    <span class="dots"></span>-->
    <!--                                </div>-->
    <!--                                <h3 class="box-title"><a href="service-details.html">Cloud Computing</a></h3>-->
    <!--                                <p class="service-featured_text">Conveniently promote transparent materials and stand-alone strategic theme areas.</p>-->
    <!--                                <a href="service-details.html" class="icon-btn"><i class="fa-regular fa-arrow-right"></i></a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="service-featured">-->
    <!--                            <div class="service-featured_content">-->
    <!--                                <div class="shape-icon">-->
    <!--                                    <img src="assets/img/icon/service_featured_3.svg" alt="Icon">-->
    <!--                                    <span class="dots"></span>-->
    <!--                                </div>-->
    <!--                                <h3 class="box-title"><a href="service-details.html">Backup & Recovery</a></h3>-->
    <!--                                <p class="service-featured_text">Conveniently promote transparent materials and stand-alone strategic theme areas.</p>-->
    <!--                                <a href="service-details.html" class="icon-btn"><i class="fa-regular fa-arrow-right"></i></a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="swiper-slide">-->
    <!--                        <div class="service-featured">-->
    <!--                            <div class="service-featured_content">-->
    <!--                                <div class="shape-icon">-->
    <!--                                    <img src="assets/img/icon/service_featured_4.svg" alt="Icon">-->
    <!--                                    <span class="dots"></span>-->
    <!--                                </div>-->
    <!--                                <h3 class="box-title"><a href="service-details.html">Machine Learning</a></h3>-->
    <!--                                <p class="service-featured_text">Conveniently promote transparent materials and stand-alone strategic theme areas.</p>-->
    <!--                                <a href="service-details.html" class="icon-btn"><i class="fa-regular fa-arrow-right"></i></a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!--==============================
                                                                                                    About Area
                                                                                                ==============================-->
    <div class="space" id="about-sec"
        style="background-color: #ffffff; background-image: url('{{ asset('assets_frontend/assets/img/bg/service_bg_1.png') }}'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="img-box1">
                        <div class="img1">
                            <img src="{{ asset('assets_frontend/assets/img/normal/about_1_1.png') }}" alt="About">
                        </div>
                        <!-- <div class="shape1">
                                                                                                                        <img src="{{ asset('assets_frontend/assets/img/normal/about_shape_1.png') }}" alt="shape">
                                                                                                                    </div> -->
                        <div class="year-counter">
                            <h3 class="year-counter_number"><span class="counter-number">{{ $about->circle_title ?? '25' }}</span></h3>
                            <p class="year-counter_text">{{ $about->circle_subtitle ?? 'Years Experience' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="ps-xxl-4 ms-xl-3">
                        <div class="title-area mb-35">
                            <span class="sub-title">
                                <div class="icon-masking me-2">
                                    <span class="mask-icon"
                                        data-mask-src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_1.svg') }}"></span>
                                    <img src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_1.svg') }}"
                                        alt="shape">
                                </div>
                                About Us
                            </span>
                            <h2 class="sec-title">
                                {{ $about->title_black ?? 'We Are Increasing Business Success With' }}
                                <span class="text-theme">{{ $about->title_blue ?? 'IT Solution' }}</span>
                            </h2>
                        </div>
                        <p class="mt-n2 mb-25">
                            {{ $about->title_description ?? 'Collaboratively envisioneer user friendly supply chains and cross unit imperative. Authoritativel fabricate competitive resource and holistic synergy. Uniquely generate efficient schemas before future.' }}
                        </p>
                        <div class="about-feature-wrap">
                            @if(isset($about->features) && $about->features->where('is_active', true)->count() > 0)
                                @foreach($about->features->where('is_active', true) as $feature)
                                    <div class="about-feature">
                                        <div class="about-feature_icon">
                                           <img src="{{ asset($feature->icon_path ?? 'assets_frontend/assets/img/icon/about_feature_1_1.svg') }}" style="width: 50px; height: 50px;" alt="Icon">
                                        </div>
                                        <div class="media-body">
                                            <h3 class="about-feature_title">{{ $feature->title }}</h3>
                                            <p class="about-feature_text">{{ $feature->description }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="about-feature">
                                    <div class="about-feature_icon">
                                        <img src="{{ asset('assets_frontend/assets/img/icon/about_feature_1_1.svg') }}" alt="Icon">
                                    </div>
                                    <div class="media-body">
                                        <h3 class="about-feature_title">Certified Company</h3>
                                        <p class="about-feature_text">Best Provide Skills Services</p>
                                    </div>
                                </div>
                                <div class="about-feature">
                                    <div class="about-feature_icon">
                                        <img src="{{ asset('assets_frontend/assets/img/icon/about_feature_1_2.svg') }}" alt="Icon">
                                    </div>
                                    <div class="media-body">
                                        <h3 class="about-feature_title">Expert Team</h3>
                                        <p class="about-feature_text">100% Expert Team</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="btn-group">
                            <a href="{{ url('about') }}" class="th-btn">DISCOVER MORE<i
                                    class="fa-regular fa-arrow-right ms-2"></i></a>
                            <div class="call-btn">
                                <div class="play-btn">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="media-body">
                                    <span class="btn-text">Call Us On:</span>
                                    <a href="tel:+19088000393" class="btn-title">+190-8800-0393</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
                                    Service Area
                            ==============================-->
    <section class="service-sec space" id="service-sec"
        data-bg-src="{{ asset('assets_frontend/assets/img/bg/service_bg_1.png') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-7 col-sm-10 px-xl-4">
                    <div class="title-area text-center">
                        <span class="sub-title">
                            <div class="icon-masking me-2">
                                <span class="mask-icon"
                                    data-mask-src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_1.svg') }}"></span>
                                <img src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_1.svg') }}"
                                    alt="shape">
                            </div>
                            OUR SERVICES
                        </span>
                        <h2 class="sec-title">We Provide Exclusive <span class="text-theme"> Service</span> For Your
                            Business</h2>
                    </div>
                </div>
            </div>

            <div class="row gy-4">
                @foreach ($services as $index => $service)
                    <div class="col-md-6 col-xl-4">
                        <div class="service-card">
                            <div class="service-card_number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                            <div class="shape-icon">
                                <img src="{{ $service->image ? asset('storage/' . $service->image) : asset('assets_frontend/assets/img/default.png') }}"
                                    alt="Icon">
                                <span class="dots"></span>
                            </div>
                            <h3 class="box-title">
                                <a href="{{ route('service.details', $service->id) }}">{{ $service->title }}</a>
                            </h3>
                            <p class="service-card_text">
                                {{ \Illuminate\Support\Str::limit(strip_tags($service->description), 100) }}
                            </p>
                            <a href="{{ route('service.details', $service->id) }}" class="th-btn">Read More<i
                                    class="fa-regular fa-arrow-right ms-2"></i></a>
                            <div class="bg-shape">
                                <img src="{{ asset('assets_frontend/assets/img/bg/service_card_bg.png') }}"
                                    alt="bg">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('services.list') }}" class="th-btn">VIEW ALL SERVICES<i
                        class="fa-regular fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </section>


    <!--==============================
                                                                                                                Cta Area
                                                                                                                ==============================-->
    <!--<section class="bg-bottom-right position-relative" data-bg-src="assets/img/bg/cta_bg_1.png" data-bg-color="#080E1C">-->
    <!--    <div class="img-half img-left th-video2">-->
    <!--        <img src="assets/img/normal/cta_1.jpg" alt="video">-->
    <!--        <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn popup-video"><i class="fas fa-play"></i></a>-->
    <!--    </div>-->
    <!--    <div class="container">-->
    <!--        <div class="row justify-content-end">-->
    <!--            <div class="col-xl-5 space">-->
    <!--                <div class="title-area mb-35">-->
    <!--                    <span class="sub-title">-->
    <!--                        <div class="icon-masking me-2">-->
    <!--                            <span class="mask-icon" data-mask-src="assets/img/theme-img/title_shape_1.svg"></span>-->
    <!--                            <img src="assets/img/theme-img/title_shape_1.svg" alt="shape">-->
    <!--                        </div>-->
    <!--                        GET BEST IT SOLUTION 2024-->
    <!--                    </span>-->
    <!--                    <h2 class="sec-title text-white">We Help Businesses To Achieve Their <span class="text-theme">Objectives</span></h2>-->
    <!--                </div>-->
    <!--                <p class="mt-n2 mb-30 text-white">Authoritatively build ubiquitous models vis-a-vis fully tested mindshare. Conveniently repurpose user friendly paradigms vis-a-vis out-of-the-box portals. Dramatically matrix magnetic schemas for extensive methodologies. Credibly.</p>-->
    <!--                <a href="about.html" class="th-btn style3">DISCOVER MORE<i class="fa-regular fa-arrow-right ms-2"></i></a>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="shape-mockup" data-bottom="0" data-right="0">-->
    <!--        <div class="particle-1" id="particle-1"></div>-->
    <!--    </div>-->
    <!--</section>-->

    <!--==============================
                                                        Feature Area
                                                    ==============================-->
    <div class="space-top" data-bg-src="{{ asset('assets_frontend/assets/img/bg/why_bg_1.png') }}">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-xxl-7 col-xl-6 mb-30 mb-xl-0">
                    <div class="img-box2">
                        <div class="img1">
                            <img src="{{ $whyChooseUs && $whyChooseUs->image ? asset('storage/' . $whyChooseUs->image) : asset('assets_frontend/assets/img/normal/why_1_1.jpg') }}" alt="Why">
                        </div>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-6">
                    <div class="title-area mb-35">
                        <span class="sub-title">
                            <div class="icon-masking me-2">
                                <span class="mask-icon"
                                    data-mask-src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_1.svg') }}"></span>
                                <img src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_1.svg') }}"
                                    alt="shape">
                            </div>
                            {{ $whyChooseUs->subtitle ?? 'WHY CHOOSE US' }}
                        </span>
                        <h2 class="sec-title">{{ $whyChooseUs->title_black ?? 'We Deal With The Aspects Professional' }} <span class="text-theme">{{ $whyChooseUs->title_blue ?? 'IT Services' }}</span></h2>
                    </div>
                    <p class="mt-n2 mb-30">
                        {{ $whyChooseUs->description ?? 'Collaboratively envisioneer user friendly supply chains and cross unit imperative. Authoritativel fabricate competitive resource and holistic.' }}
                    </p>
                    <div class="row">
                        @if($whyChooseUs && $whyChooseUs->features->count() > 0)
                            @foreach($whyChooseUs->features as $feature)
                                <div class="col-md-6">
                                    <div class="checklist style2">
                                        <ul>
                                            <li><i class="{{ $feature->icon ?? 'far fa-check' }}"></i> {{ $feature->title }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-6">
                                <div class="checklist style2">
                                    <ul>
                                        <li><i class="far fa-check"></i> Big Data Analysis</li>
                                        <li><i class="far fa-check"></i> 24/7 Online Support</li>
                                        <li><i class="far fa-check"></i> Business Improvement</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checklist style2">
                                    <ul>
                                        <li><i class="far fa-check"></i> High Quality Security</li>
                                        <li><i class="far fa-check"></i> 24/7 Support Team</li>
                                        <li><i class="far fa-check"></i> Easy Solutions</li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>    <!--==============================
                                                                        Counter Area
                                                                    ==============================-->
    <div class="space-top" data-pos-for=".team-sec" data-sec-pos="bottom-half">
        <div class="container z-index-common">
            <div class="counter-card-wrap" data-bg-src="{{ asset('assets_frontend/assets/img/bg/counter_bg_2.png') }}">
                <div class="row gy-40 justify-content-between">
                    @if(isset($achievements) && $achievements->count() > 0)
                        @foreach($achievements as $achievement)
                            <div class="col-6 col-lg-auto">
                                <div class="counter-card">
                                    <div class="counter-card_icon">
                                        <img src="{{ asset('assets_frontend/assets/img/icon/counter_1_1.svg') }}" alt="Icon">
                                    </div>
                                    <div class="media-body">
                                        <h2 class="counter-card_number"><span class="counter-number">{{ $achievement->achievement_value }}</span>{{ $achievement->achievement_unit }}</h2>
                                        <p class="counter-card_text">{{ $achievement->achievement_description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-6 col-lg-auto">
                            <div class="counter-card">
                                <div class="counter-card_icon">
                                    <img src="{{ asset('assets_frontend/assets/img/icon/counter_1_1.svg') }}" alt="Icon">
                                </div>
                                <div class="media-body">
                                    <h2 class="counter-card_number"><span class="counter-number">986</span>+</h2>
                                    <p class="counter-card_text">Finished Project</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-auto">
                            <div class="counter-card">
                                <div class="counter-card_icon">
                                    <img src="{{ asset('assets_frontend/assets/img/icon/counter_1_2.svg') }}" alt="Icon">
                                </div>
                                <div class="media-body">
                                    <h2 class="counter-card_number"><span class="counter-number">896</span>+</h2>
                                    <p class="counter-card_text">Happy Clients</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-auto">
                            <div class="counter-card">
                                <div class="counter-card_icon">
                                    <img src="{{ asset('assets_frontend/assets/img/icon/counter_1_3.svg') }}" alt="Icon">
                                </div>
                                <div class="media-body">
                                    <h2 class="counter-card_number"><span class="counter-number">396</span>+</h2>
                                    <p class="counter-card_text">Skilled Experts</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-auto">
                            <div class="counter-card">
                                <div class="counter-card_icon">
                                    <img src="{{ asset('assets_frontend/assets/img/icon/counter_1_4.svg') }}" alt="Icon">
                                </div>
                                <div class="media-body">
                                    <h2 class="counter-card_number"><span class="counter-number">496</span>+</h2>
                                    <p class="counter-card_text">Honorable Awards</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!--==============================
                            Team Area
                        ==============================-->
    <section class="team-sec space">
        <div class="container z-index-common">
            <div class="title-area text-center">
                <span class="sub-title">
                    <div class="icon-masking me-2">
                        <span class="mask-icon"
                            data-mask-src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_1.svg') }}"></span>
                        <img src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_1.svg') }}" alt="shape">
                    </div>
                    TEAM MEMBER
                </span>
                <h2 class="sec-title">See Our Skilled Expert <span class="text-theme">Team</span></h2>
            </div>

            <div class="slider-area">
                <div class="swiper th-slider has-shadow" id="teamSlider2"
                    data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":1},"768":{"slidesPerView":2},"992":{"slidesPerView":3},"1200":{"slidesPerView":4}}}'>
                    <div class="swiper-wrapper">
                        @foreach ($teams as $index => $team)
                            <div class="swiper-slide">
                                <div class="th-team team-card">
                                    <div class="team-img">
                                        <img src="{{ asset('storage/' . $team->image) }}" alt="{{ $team->name }}">
                                    </div>
                                    <div class="team-content">
                                        <div class="box-particle" id="team-p{{ $index + 1 }}"></div>
                                        <div class="team-social">
                                            <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
                                            <a target="_blank" href="#"><i class="fab fa-instagram"></i></a>
                                            <a target="_blank" href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </div>
                                        <h3 class="box-title">
                                            <a
                                                href="{{ route('frontend.team.details', $team->id) }}">{{ $team->name }}</a>
                                        </h3>
                                        <span class="team-desig">{{ $team->position }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button data-slider-prev="#teamSlider2" class="slider-arrow style3 slider-prev">
                    <i class="far fa-arrow-left"></i>
                </button>
                <button data-slider-next="#teamSlider2" class="slider-arrow style3 slider-next">
                    <i class="far fa-arrow-right"></i>
                </button>
            </div>
        </div>
        <div class="shape-mockup" data-bottom="0" data-left="0">
            <div class="particle-2" id="particle-2"></div>
        </div>
    </section>

    <!--==============================
                                                            Project Area
                                                        ==============================-->
    <section class="space">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg-5 mb-n2 mb-lg-0">
                    <div class="title-area text-center text-lg-start">
                        <span class="sub-title">
                            <div class="icon-masking me-2">
                                <span class="mask-icon"
                                    data-mask-src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_1.svg') }}"></span>
                                <img src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_1.svg') }}"
                                    alt="shape">
                            </div>LATEST PROJECT
                        </span>
                        <h2 class="sec-title">See We Have Solution <br> Done <span class="text-theme">IT Projects</span>
                        </h2>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="sec-btn">
                        <a href="{{ url('project') }}" class="th-btn">VIEW ALL PROJECTS<i
                                class="fa-regular fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>

            <div class="slider-area">
                <div class="swiper th-slider has-shadow" id="projectSlider1"
                    data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
                    <div class="swiper-wrapper">


                        @foreach ($projects as $project)
                            <div class="swiper-slide">
                                <div class="project-card">
                                    <div class="project-img">
                                        <img src="{{ asset('storage/' . $project->image) }}"
                                            alt="{{ $project->title }}">
                                    </div>
                                    <div class="project-content-wrap">
                                        <div class="project-content">
                                            <div class="box-particle" id="project-p{{ $loop->index }}"></div>
                                            <h3 class="box-title">
                                                <a
                                                    href="{{ route('project.details', $project->id) }}">{{ $project->title }}</a>
                                            </h3>
                                            <p class="project-subtitle">{{ $project->category }}</p>
                                            <a href="{{ asset('storage/' . $project->image) }}"
                                                class="icon-btn popup-image">
                                                <i class="far fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
                <button data-slider-prev="#projectSlider1" class="slider-arrow style3 slider-prev"><i
                        class="far fa-arrow-left"></i></button>
                <button data-slider-next="#projectSlider1" class="slider-arrow style3 slider-next"><i
                        class="far fa-arrow-right"></i></button>
            </div>
        </div>

        <div class="shape-mockup" data-top="0%" data-right="0%">
            <img src="{{ asset('assets_frontend/assets/img/shape/tech_shape_1.png') }}" alt="shape">
        </div>
                </div>
        <div class="shape-mockup" data-bottom="0%" data-left="0%">
            <img src="{{ asset('assets_frontend/assets/img/shape/tech_shape_2.png') }}" alt="shape">
        </div>
    </section>

    <!--==============================
                                                        Testimonial Area
                                                    ==============================-->
    @include('frontend.partials.testimonial-section')

    <!--==============================
                                                    Contact Area
                                                ==============================-->
    </section>

    <!--==============================
                                                        Testimonial Area
                                                    ==============================-->
    <section class="overflow-hidden space" data-bg-src="{{ asset('assets_frontend/assets/img/bg/testi_bg_1.jpg') }}"
        data-overlay="overlay1" data-opacity="9">
        <div class="container z-index-common">
            <div class="row align-items-center">
                <div class="col-xl-5">
                    <div class="pe-xxl-5 text-xl-start text-center">
                        <div class="title-area mb-35">
                            <span class="sub-title">
                                <div class="icon-masking me-2">
                                    <span class="mask-icon"
                                        data-mask-src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_1.svg') }}"></span>
                                    <img src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_1.svg') }}"
                                        alt="shape">
                                </div>
                                @if(isset($testimonialTitle) && $testimonialTitle)
                                    {{ $testimonialTitle->subtitle }}
                                @else
                                    {{ $subtitle ?? 'TESTIMONIALS' }}
                                @endif
                            </span>
                            @if(isset($testimonialTitle) && $testimonialTitle)
                                <h2 class="sec-title text-white">{{ $testimonialTitle->title_black }} <span
                                    class="text-theme">{{ $testimonialTitle->title_blue }}</span></h2>
                            @else
                                <h2 class="sec-title text-white">Let’s Hear What Are The Customer <span
                                        class="text-theme">Saying</span></h2>
                            @endif
                        </div>
                        <p class="mt-n2 mb-35 text-white">
                            @if(isset($testimonialTitle) && $testimonialTitle)
                                {{ $testimonialTitle->description }}
                            @else
                                Appropriately envisioneer leveraged information through 2.0 communities.
                                Synergistically parallel task inexpensive products whereas cross-media ideas.
                            @endif
                        </p>
                        <a href="{{ url('about') }}" class="th-btn style3 shadow-none">VIEW MORE<i
                                class="fa-regular fa-arrow-right ms-2"></i></a>
                    </div>
                </div>

                <div class="col-xl-7 mt-40 mt-xl-0">
                    <div class="testi-card-area slider-area">
                        <div class="swiper th-slider" id="testiSlide1"
                            data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"1"},"1200":{"slidesPerView":"1"}}}'>
                            <div class="swiper-wrapper">
                                @foreach ($testimonials as $index => $testi)
                                    <div class="swiper-slide">
                                        <div class="testi-card">
                                            <div class="testi-card_review">
                                                @for ($i = 0; $i < 5; $i++)
                                                    <i class="fa-solid fa-star-sharp"></i>
                                                @endfor
                                            </div>
                                            <p class="testi-card_text">{{ $testi['review'] }}</p>
                                            <div class="testi-card_profile">
                                                <div class="testi-card_avater">
                                                    <img src="{{ isset($testi->image) && $testi->image ? asset('storage/' . $testi->image) : asset('assets_frontend/assets/img/testimonial/testi_2_1.jpg') }}"
                                                        style="width: 80px; height: 80px;"
                                                        alt="Avatar">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="testi-card_name">{{ $testi['name'] }}</h3>
                                                    <span class="testi-card_desig">{{ $testi['position'] }}</span>
                                                </div>
                                            </div>
                                            <div class="testi-card_quote">
                                                <img src="{{ asset('assets_frontend/assets/img/icon/quote_left.svg') }}"
                                                    alt="quote">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="testi-thumb-wrap">
                            <div class="testi-thumb testi-card-tab" data-slider-tab="#testiSlide1">
                                @foreach ($testimonials as $testi)
                                    <div class="tab-btn {{ $loop->first ? 'active' : '' }}">
                                        <img src="{{ asset('assets_frontend/assets/img/testimonial/' . $testi['img']) }}"
                                            alt="Image">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--==============================
                                                    Contact Area
                                                ==============================-->
    <div class="space" id="contact-sec"
        data-bg-src="{{ $contactSection && $contactSection->background_image ? asset('storage/' . $contactSection->background_image) : asset('assets_frontend/assets/img/bg/appointment_bg_1.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 pe-xxl-5 mb-40 mb-xl-0">
                    <div class="title-area mb-35 text-xl-start text-center">
                        <span class="sub-title">
                            <div class="icon-masking me-2">
                                <span class="mask-icon"
                                    data-mask-src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_1.svg') }}"></span>
                                <img src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_1.svg') }}"
                                    alt="shape">
                            </div>
                            {{ $contactSectionTitle->subtitle ?? 'APPOINTMENT NOW' }}
                        </span>
                        <h2 class="sec-title">
                            {{ $contactSectionTitle->title_black ?? 'We\'re Ready to Talk About Your' }} <span class="text-theme">{{ $contactSectionTitle->title_blue ?? 'Opportunities' }}</span>
                        </h2>
                    </div>
                    <p class="mt-n2 mb-30 text-xl-start text-center">
                        {{ $contactSectionTitle->description ?? 'Progressively morph principle-centered e-markets without an expanded array of opportunities. Conveniently incubate e-tailers for extensive leadership skills. Holisticly extend leading-edge vortals vis-a-vis 24/7 e-markets. Appropriately evolve efficient functionalities with installed base relationships.' }}
                    </p>
                    <div class="contact-feature-wrap">
                        @if($contactSection && $contactSection->features->count() > 0)
                            @foreach($contactSection->features as $feature)
                                <div class="contact-feature">
                                    <div class="icon-btn">
                                        <i class="{{ $feature->icon }}"></i>
                                    </div>
                                    <div class="media-body">
                                        <p class="contact-feature_label">{{ $feature->label }}</p>
                                        @if($feature->link)
                                            <a href="{{ $feature->link }}" class="contact-feature_link">{{ $feature->value }}</a>
                                        @else
                                            <span class="contact-feature_link">{{ $feature->value }}</span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="contact-feature">
                                <div class="icon-btn">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="media-body">
                                    <p class="contact-feature_label">Call Us On:</p>
                                    <a href="tel:+19088000393" class="contact-feature_link">+190-8800-0393</a>
                                </div>
                            </div>
                            <div class="contact-feature">
                                <div class="icon-btn">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div class="media-body">
                                    <p class="contact-feature_label">Quick Mail Us:</p>
                                    <a href="mailto:info@webteck.com" class="contact-feature_link">info@webteck.com</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-xl-6 ps-xl-4">
                    <h3 class="h4 mt-n2 mb-30 text-center">{{ $contactSection->form_title ?? 'Make An Appointment' }}</h3>
                    <form action="mail.php" method="POST" class="appoitment-form ajax-contact">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Enter Your Name">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Enter Your Email">
                            </div>
                            <div class="form-group col-sm-6">
                                <select name="subject" id="subject" class="form-select">
                                    <option value="" disabled selected hidden>Select Subject</option>
                                    <option value="IT Consult">IT Consult</option>
                                    <option value="UI/UX Design">UI/UX Design</option>
                                    <option value="Branding Solution">Branding Solution</option>
                                    <option value="Product Marketing">Product Marketing</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="tel" class="form-control" name="number" id="number"
                                    placeholder="Phone Number">
                            </div>
                            <div class="form-group col-12">
                                <textarea name="message" id="message" cols="30" rows="3" class="form-control"
                                    placeholder="Write Your Message"></textarea>
                            </div>
                            <div class="form-btn col-12">
                                <button class="th-btn w-100">MAKE AN APPOINTMENT</button>
                            </div>
                        </div>
                        <p class="form-messages mb-0 mt-3"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
