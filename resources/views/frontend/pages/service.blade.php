 @extends('frontend2')

 @section('content')
     <!--==============================
                                                                Breadcumb
                                                            ==============================-->
     @include('frontend.partials.breadcrumb', [
         'title' => $servicePage->breadcrumb_title ?? 'Our Services',
         'bgImage' => !empty($servicePage?->breadcrumb_image)
             ? 'storage/' . $servicePage->breadcrumb_image
             : (!empty($pageSettings?->breadcrumb_image)
                 ? 'storage/' . $pageSettings->breadcrumb_image
                 : 'assets_frontend/assets/img/bg/breadcumb-bg.jpg'),
         'breadcrumb' => [['label' => $servicePage->breadcrumb_title ?? 'Our Services']],
     ])

     <div class="container">
         <div class="breadcumb-content">
             <h1 class="breadcumb-title">{{ $servicePage->breadcrumb_title ?? 'Services' }}</h1>
             <ul class="breadcumb-menu">
                 <li><a href="{{ url('/') }}">Home</a></li>
                 <li>{{ $servicePage->breadcrumb_title ?? 'Services' }}</li>
             </ul>
         </div>
     </div>
     </div>

     <!--==============================
                                                                Service Area
                                                            ==============================-->
     <section class="space" id="service-sec">
         <div class="container">
             @if($servicePage->service_section_subtitle || $servicePage->service_section_title || $servicePage->service_section_description)
                 <div class="title-area text-center mb-5">
                     @if($servicePage->service_section_subtitle)
                         <span class="sub-title">
                             <div class="icon-masking me-2">
                                 <span class="mask-icon" data-mask-src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_1.svg') }}"></span>
                                 <img src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_1.svg') }}" alt="shape">
                             </div>
                             {{ $servicePage->service_section_subtitle }}
                         </span>
                     @endif
                     @if($servicePage->service_section_title)
                         <h2 class="sec-title">{{ $servicePage->service_section_title }}</h2>
                     @endif
                     @if($servicePage->service_section_description)
                         <p class="mt-3">{{ $servicePage->service_section_description }}</p>
                     @endif
                 </div>
             @endif
             <div class="row gy-4">
                 @foreach ($services as $index => $item)
                     <div class="col-md-6 col-xl-4">
                         <div class="service-card">
                             <div class="service-card_number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                             <div class="shape-icon">
                                 <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('assets_frontend/assets/img/default.png') }}"
                                     alt="Icon">
                                 <span class="dots"></span>
                             </div>
                             <h3 class="box-title">
                                 <a href="{{ route('service.details', $item->id) }}">{{ $item->title }}</a>
                             </h3>
                             <p class="service-card_text">
                                 {{ \Illuminate\Support\Str::limit(strip_tags($item->description), 100) }}
                             </p>
                             <a href="{{ route('service.details', $item->id) }}" class="th-btn">
                                 Read More <i class="fa-regular fa-arrow-right ms-2"></i>
                             </a>
                             <div class="bg-shape">
                                 <img src="{{ asset('assets_frontend/assets/img/bg/service_card_bg.png') }}" alt="bg">
                             </div>
                         </div>
                     </div>
                 @endforeach
             </div>
         </div>
     </section>

     <!--==============================
                                                        Cta Area
                                                    ==============================-->
     <section class="position-relative space">
         <div class="th-bg-img" data-bg-src="{{ $servicePage->cta_background_image ? asset('storage/' . $servicePage->cta_background_image) : asset('assets_frontend/assets/img/bg/cta_bg_2.jpg') }}">
             <img src="{{ asset('assets_frontend/assets/img/bg/bg_overlay_1.png') }}" alt="overlay">
         </div>
         <div class="container z-index-common">
             <div class="row justify-content-center">
                 <div class="col-xl-6 col-lg-7 col-md-9 text-center">
                     <div class="title-area mb-35">
                         <span class="sub-title">
                             <div class="icon-masking me-2">
                                 <span class="mask-icon"
                                     data-mask-src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_2.svg') }}"></span>
                                 <img src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_2.svg') }}"
                                     alt="shape">
                             </div>
                             {{ $servicePage->cta_subtitle ?? 'CONTACT US' }}
                         </span>
                         <h2 class="sec-title text-white">{{ $servicePage->cta_title_black ?? 'Need Any Kind Of IT Solution For' }} <span
                                 class="text-theme fw-normal">{{ $servicePage->cta_title_blue ?? 'Your Business?' }}</span></h2>
                     </div>
                     <a href="{{ $servicePage->cta_button_link ?? url('/contact') }}" class="th-btn style3">{{ $servicePage->cta_button_text ?? 'Get In Touch' }}</a>
                 </div>
             </div>
         </div>
     </section>

     <!--==============================
                                                        Process Area
                                                    ==============================-->
     <section class="bg-smoke" id="process-sec"
         data-bg-src="{{ asset('assets_frontend/assets/img/bg/process_bg_1.png') }}">
         <div class="container space">
             <div class="title-area text-center">
                 <span class="sub-title">
                     <div class="icon-masking me-2">
                         <span class="mask-icon"
                             data-mask-src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_2.svg') }}"></span>
                         <img src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_2.svg') }}" alt="shape">
                     </div>
                     {{ $servicePage->process_subtitle ?? 'WORK PROCESS' }}
                 </span>
                 <h2 class="sec-title">{{ $servicePage->process_title_black ?? 'How to work' }} <span class="text-theme">{{ $servicePage->process_title_blue ?? 'it!' }}</span></h2>
             </div>
             <div class="process-card-area">
                 <!-- <div class="process-line">
                     <img src="{{ asset('assets_frontend/assets/img/bg/process_line.svg') }}" alt="line">
                 </div> -->
                 <div class="row gy-40">
                     @php
                         $processSteps = $servicePage->process_steps ?? [
                             ['number' => '01', 'title' => 'Select a project', 'icon' => 'process_card_1.svg', 'description' => 'Continua scale empowered metrics with cost effective innovation.'],
                             ['number' => '02', 'title' => 'Project analysis', 'icon' => 'process_card_2.svg', 'description' => 'Continua scale empowered metrics with cost effective innovation.'],
                             ['number' => '03', 'title' => 'Plan Execute', 'icon' => 'process_card_3.svg', 'description' => 'Continua scale empowered metrics with cost effective innovation.'],
                             ['number' => '04', 'title' => 'Deliver result', 'icon' => 'process_card_4.svg', 'description' => 'Continua scale empowered metrics with cost effective innovation.'],
                         ];
                     @endphp

                     @foreach ($processSteps as $step)
                         <div class="col-sm-6 col-xl-3 process-card-wrap">
                             <div class="process-card">
                                 <div class="process-card_number">{{ $step['number'] }}</div>
                                 <div class="process-card_icon">
                                     <img src="{{ isset($step['icon']) && $step['icon'] ? asset('storage/' . $step['icon']) : asset('assets_frontend/assets/img/icon/process_card_1.svg') }}"
                                         alt="icon">
                                 </div>
                                 <h2 class="box-title">{{ $step['title'] }}</h2>
                                 <p class="process-card_text">{{ $step['description'] ?? 'Continua scale empowered metrics with cost effective innovation.' }}</p>
                             </div>
                         </div>
                     @endforeach
                 </div>
             </div>
         </div>
     </section>

     <!--==============================
                                                Testimonial Area
                                            ==============================-->
    @include('frontend.partials.testimonial-section', [
        'testimonials' => $testimonials,
        'subtitle' => $servicePage->testimonial_subtitle ?? 'CUSTOMER FEEDBACK', 
        'titleBlack' => $servicePage->testimonial_title_black ?? 'What Happy Clients Says',
        'titleBlue' => $servicePage->testimonial_title_blue ?? 'About Us?',
        'sliderId' => 'testiSlider2',
        'bgImage' => asset('assets_frontend/assets/img/bg/testi_bg_2.png')
    ])

 @endsection
