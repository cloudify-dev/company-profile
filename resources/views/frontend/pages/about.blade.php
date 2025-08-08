@extends('frontend')

@section('content')
    <!--==============================
        Breadcrumb
    ==============================-->
    <div class="breadcumb-wrapper " data-bg-src="{{ asset('assets_frontend/assets/img/bg/breadcumb-bg.jpg') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">About Us</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>About Us</li>d
                </ul>
            </div>
        </div>
    </div>

    <!--==============================
    About Area
    ==============================-->
    <div class="overflow-hidden space" id="about-sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="img-box1">
                        <div class="img1">
                            <img src="{{ asset('assets_frontend/assets/img/normal/about_1_1.png') }}" alt="About">
                        </div>
                        <div class="shape1">
                            <img src="{{ asset('assets_frontend/assets/img/normal/about_shape_1.png') }}" alt="shape">
                        </div>
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
                                    <span class="mask-icon" data-mask-src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_1.svg') }}"></span>
                                    <img src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_1.svg') }}" alt="shape">
                                </div>About Us
                            </span>
                            <h2 class="sec-title">{{ $about->title_black ?? 'We Are Increasing Business Success With' }} <span class="text-theme">{{ $about->title_blue ?? 'IT Solution' }}</span></h2>
                        </div>
                        <p class="mt-n2 mb-25">{{ $about->title_description ?? 'Collaboratively envisioneer user friendly supply chains and cross unit imperative. Authoritativel fabricate competitive resource and holistic synergy. Uniquely generate efficient schemas before future.' }}</p>
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
                            <a href="{{ route('about') }}" class="th-btn">DISCOVER MORE<i class="fa-regular fa-arrow-right ms-2"></i></a>
                            <div class="call-btn">
                                <div class="play-btn">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="media-body">
                                    <span class="btn-text">Call Us On:</span>
                                    <a href="tel:+19088000393" class="btn-title">{{ '$about->phone' }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
    Team Area
    ==============================-->
    @include('frontend.partials.team-section', [
        'teams' => $teams,
        'teamTitle' => $teamTitle,
        'sliderId' => 'teamSlider2'
    ])

    <!--==============================
    Counter Area
    ==============================-->
    <div class="bg-theme space-extra" data-bg-src="{{ asset('assets_frontend/assets/img/bg/counter_bg_1.png') }}">
        <div class="container py-2">
            <div class="row gy-40 justify-content-between">
                @if(isset($about->achievements) && $about->achievements->where('is_active', true)->count() > 0)
                    @foreach($about->achievements->where('is_active', true) as $achievement)
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
     <!--==============================
        Testimonial Area
    ==============================-->
    @include('frontend.partials.testimonial-section', [
        'testimonials' => $testimonials,
        'testimonialTitle' => $testimonialTitle,
        'sliderId' => 'testiSlider2',
        'bgImage' => asset('assets_frontend/assets/img/bg/testi_bg_2.png')
    ])
@endsection
