@extends('frontend2')

@section('content')
    <!--==============================
                                                                                    Breadcumb
                                                                                ==============================-->
    @include('frontend.partials.breadcrumb', [
        'title' => $pageSettings->breadcrumb_title ?? ($service->title ?? 'Service Details'),
        'bgImage' => !empty($pageSettings?->breadcrumb_image)
            ? 'storage/' . $pageSettings->breadcrumb_image
            : 'assets_frontend/assets/img/bg/breadcumb-bg.jpg',
        'breadcrumb' => [
            ['url' => url('/service'), 'label' => 'Our Services'],
            ['label' => $service->title ?? 'Service Details'],
        ],
    ]) <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Services Details</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Services Details</li>
            </ul>
        </div>
    </div>
    </div>

    <!--==============================
                                                                                                                    Service Area
                                                                                                                ==============================-->
    <section class="space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-8">
                    <div class="page-single">
                        <div class="page-img">
                            <img src="{{ asset('storage/' . $service->image) }}" alt="Service Image">
                        </div>
                        <div class="page-content">
                            <h2 class="h3 page-title">{{ $service->title }}</h2>
                            <p>{{ $service->description }}</p>

                            <div class="row">
                                <div class="col-md-6 mb-30">
                                    <div class="th-video">
                                        <img class="w-100"
                                            src="{{ $service->video_thumbnail ? asset('storage/' . $service->video_thumbnail) : asset('assets_frontend/assets/img/service/service_inner_1.jpg') }}"
                                            alt="service">
                                        @if($service->video_url)
                                            <a href="{{ $service->video_url }}"
                                                class="play-btn popup-video"><i class="fas fa-play"></i></a>
                                        @else
                                            <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk"
                                                class="play-btn popup-video"><i class="fas fa-play"></i></a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 mb-30">
                                    <h3 class="h4 mb-20">{{ $service->section_title ?: 'We Serve The Best Work' }}</h3>
                                    @if($service->checklist_items && count($service->checklist_items) > 0)
                                        <div class="checklist style5">
                                            <ul>
                                                @foreach($service->checklist_items as $item)
                                                    <li><i class="fas fa-octagon-check"></i> {{ $item }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @else
                                        <div class="checklist style5">
                                            <ul>
                                                <li><i class="fas fa-octagon-check"></i> Up am intention on dependent
                                                    questions</li>
                                                <li><i class="fas fa-octagon-check"></i> Surrounded affronting favourable
                                                </li>
                                                <li><i class="fas fa-octagon-check"></i> Sed ut perspiciatis unde omnis iste
                                                    natus</li>
                                                <li><i class="fas fa-octagon-check"></i> Special Careness Risk Free</li>
                                                <li><i class="fas fa-octagon-check"></i> Bibend auctor nisi elit volume are
                                                    beguiled</li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            @if($service->additional_description)
                                <p class="mb-4">{{ $service->additional_description }}</p>
                            @else
                                <p class="mb-4">Credibly brand accurate data after user friendly ROI. Professionally
                                    negotiate inexpensive markets and team driven scenarios. Interactively seize wireless
                                    e-tailers after resource maximizing content. Collaboratively leverage existing.</p>
                            @endif

                            <h3 class="h4 mb-20">{{ $service->benefits_title ?: 'Benefits With Our Service' }}</h3>

                            <div class="service-feature-wrap">
                                @if($service->benefits && $service->benefits->count() > 0)
                                    @foreach($service->benefits as $benefit)
                                        <div class="service-feature">
                                            <div class="service-feature_icon">
                                                <img src="{{ $benefit->icon ? asset('storage/' . $benefit->icon) : asset('assets_frontend/assets/img/icon/service_feature_1.svg') }}"
                                                    alt="icon">
                                            </div>
                                            <div class="media-body">
                                                <h4 class="service-feature_title">{{ $benefit->title }}</h4>
                                                <p class="service-feature_text">{{ $benefit->description }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="service-feature">
                                        <div class="service-feature_icon">
                                            <img src="{{ asset('assets_frontend/assets/img/icon/service_feature_1.svg') }}"
                                                alt="icon">
                                        </div>
                                        <div class="media-body">
                                            <h4 class="service-feature_title">Flexible Solutions</h4>
                                            <p class="service-feature_text">Completely grow multimedia based content before
                                                global scenarios.</p>
                                        </div>
                                    </div>
                                    <div class="service-feature">
                                        <div class="service-feature_icon">
                                            <img src="{{ asset('assets_frontend/assets/img/icon/service_feature_2.svg') }}"
                                                alt="icon">
                                        </div>
                                        <div class="media-body">
                                            <h4 class="service-feature_title">24/7 Unlimited Support</h4>
                                            <p class="service-feature_text">Completely grow multimedia based content before
                                                global scenarios.</p>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <h3 class="h4 mt-35 mb-4">{{ $service->faqs_title ?: 'Questions About Service' }}</h3>
                            <div class="accordion-area accordion" id="faqAccordion">
                                @if($service->faqs && $service->faqs->count() > 0)
                                    @foreach($service->faqs as $index => $faq)
                                        <div class="accordion-card style2 {{ $index === 0 ? 'active' : '' }}">
                                            <div class="accordion-header" id="collapse-item-{{ $index + 1 }}">
                                                <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse-{{ $index + 1 }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                                    aria-controls="collapse-{{ $index + 1 }}">{{ $faq->question }}</button>
                                            </div>
                                            <div id="collapse-{{ $index + 1 }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                                aria-labelledby="collapse-item-{{ $index + 1 }}" data-bs-parent="#faqAccordion">
                                                <div class="accordion-body">
                                                    <p class="faq-text">{{ $faq->answer }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="accordion-card style2 active">
                                        <div class="accordion-header" id="collapse-item-1">
                                            <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse-1" aria-expanded="true"
                                                aria-controls="collapse-1">Where can I get analytics help?</button>
                                        </div>
                                        <div id="collapse-1" class="accordion-collapse collapse show"
                                            aria-labelledby="collapse-item-1" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                <p class="faq-text">Synergistically evisculate ubiquitous niches whereas
                                                    holistic resources. Assertively evolve prospective methods of
                                                    empowerment before diverse web-readiness. Seamlessly incentivize
                                                    market-driven schemas rather than clicks-and-mortar benefits.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-card style2 ">
                                        <div class="accordion-header" id="collapse-item-2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse-2" aria-expanded="false"
                                                aria-controls="collapse-2">How long should a business plan be?</button>
                                        </div>
                                        <div id="collapse-2" class="accordion-collapse collapse "
                                            aria-labelledby="collapse-item-2" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                <p class="faq-text">Synergistically evisculate ubiquitous niches whereas
                                                    holistic resources. Assertively evolve prospective methods of
                                                    empowerment before diverse web-readiness. Seamlessly incentivize
                                                    market-driven schemas rather than clicks-and-mortar benefits.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-card style2 ">
                                        <div class="accordion-header" id="collapse-item-3">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse-3" aria-expanded="false"
                                                aria-controls="collapse-3">How To Choose A Good QA Consultant?</button>
                                        </div>
                                        <div id="collapse-3" class="accordion-collapse collapse "
                                            aria-labelledby="collapse-item-3" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                <p class="faq-text">Synergistically evisculate ubiquitous niches whereas
                                                    holistic resources. Assertively evolve prospective methods of
                                                    empowerment before diverse web-readiness. Seamlessly incentivize
                                                    market-driven schemas rather than clicks-and-mortar benefits.</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-4">
                    <aside class="sidebar-area">
                        <div class="widget widget_nav_menu  ">
                            <h3 class="widget_title">{{ $service->sidebar_title ?: 'All Services' }}</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    @if($allServices && $allServices->count() > 0)
                                        @foreach($allServices as $serviceItem)
                                            <li class="{{ $serviceItem->id == $service->id ? 'current-menu-item' : '' }}">
                                                <a href="{{ route('service.details', $serviceItem->id) }}"
                                                   @if($serviceItem->id == $service->id) style="font-weight: bold; color: #007bff;" @endif>
                                                   {{ $serviceItem->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    @else
                                        <li><a href="#" class="disabled">No services available</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="widget widget_download  ">
                            <h4 class="widget_title">Download Brochure</h4>
                            <div class="download-widget-wrap">
                                @if($service->brochure_pdf)
                                    <a href="{{ asset('storage/' . $service->brochure_pdf) }}" class="th-btn" target="_blank"><i
                                            class="fa-light fa-file-pdf me-2"></i>DOWNLOAD PDF</a>
                                @else
                                    <a href="service-details.html" class="th-btn"><i
                                            class="fa-light fa-file-pdf me-2"></i>DOWNLOAD PDF</a>
                                @endif
                                @if($service->brochure_doc)
                                    <a href="{{ asset('storage/' . $service->brochure_doc) }}" class="th-btn style5" target="_blank"><i
                                            class="fa-light fa-file-lines me-2"></i>DOWNLOAD DOC</a>
                                @else
                                    <a href="service-details.html" class="th-btn style5"><i
                                            class="fa-light fa-file-lines me-2"></i>DOWNLOAD DOC</a>
                                @endif
                            </div>
                        </div>
                        <div class="widget widget_banner  "
                            data-bg-src="{{ $service->contact_widget_background ? asset('storage/' . $service->contact_widget_background) : asset('assets_frontend/assets/img/bg/widget_banner.jpg') }}">
                            <div class="widget-banner">
                                <span class="text">{{ $service->contact_widget_text ?: 'CONTACT US NOW' }}</span>
                                <h2 class="title">{{ $service->contact_widget_title ?: 'You Need Help?' }}</h2>
                                <a href="{{ $service->contact_widget_button_link ?: '/contact' }}" class="th-btn style3">{{ $service->contact_widget_button_text ?: 'GET A QUOTE' }}<i
                                        class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
