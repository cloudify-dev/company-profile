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
                                            src="{{ asset('assets_frontend/assets/img/service/service_inner_1.jpg') }}"
                                            alt="service">
                                        <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk"
                                            class="play-btn popup-video"><i class="fas fa-play"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-30">
                                    <h3 class="h4 mb-20">We Serve The Best Work</h3>
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
                                </div>
                            </div>

                            <p class="mb-4">Credibly brand accurate data after user friendly ROI. Professionally
                                negotiate inexpensive markets and team driven scenarios. Interactively seize wireless
                                e-tailers after resource maximizing content. Collaboratively leverage existing.</p>

                            <h3 class="h4 mb-20">Benefits With Our Service</h3>

                            <div class="service-feature-wrap">
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
                            </div>

                            <h3 class="h4 mt-35 mb-4">Questions About Service</h3>
                            <div class="accordion-area accordion" id="faqAccordion">


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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-4">
                    <aside class="sidebar-area">
                        <div class="widget widget_nav_menu  ">
                            <h3 class="widget_title">All Services</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="service-details.html">Web Development</a></li>
                                    <li><a href="service-details.html">UI/UX Design</a></li>
                                    <li><a href="service-details.html">Digital Marketing</a></li>
                                    <li><a href="service-details.html">Business Analysis</a></li>
                                    <li><a href="service-details.html">Softwer Services</a></li>
                                    <li><a href="service-details.html">Mechine Learning</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget widget_download  ">
                            <h4 class="widget_title">Download Brochure</h4>
                            <div class="download-widget-wrap">
                                <a href="service-details.html" class="th-btn"><i
                                        class="fa-light fa-file-pdf me-2"></i>DOWNLOAD PDF</a>
                                <a href="service-details.html" class="th-btn style5"><i
                                        class="fa-light fa-file-lines me-2"></i>DOWNLOAD DOC</a>
                            </div>
                        </div>
                        <div class="widget widget_banner  "
                            data-bg-src="{{ asset('assets_frontend/assets/img/bg/widget_banner.jpg') }}">
                            <div class="widget-banner">
                                <span class="text">CONTACT US NOW</span>
                                <h2 class="title">You Need Help?</h2>
                                <a href="contact.html" class="th-btn style3">GET A QUOTE<i
                                        class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
