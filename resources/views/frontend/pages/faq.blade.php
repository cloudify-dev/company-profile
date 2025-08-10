@extends('frontend2')

@section('content')
    @include('frontend.partials.breadcrumb', [
        'title' => 'Frequently Asked Question',
        'bgImage' => !empty($pageSettings?->breadcrumb_image)
            ? 'storage/' . $pageSettings->breadcrumb_image
            : 'assets_frontend/assets/img/bg/breadcumb-bg.jpg',
        'breadcrumb' => [['label' => 'Frequently Asked Question']],
    ])

    <!--==============================
    Faq Area
    ==============================-->
    <div class="space">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title">
                    <div class="icon-masking me-2">
                        <span class="mask-icon" data-mask-src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_2.svg') }}"></span>
                        <img src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_2.svg') }}" alt="shape">
                    </div>FAQ
                </span>
                <h2 class="sec-title">Talk To About Any <span class="text-theme">Question?</span></h2>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="accordion-area accordion" id="faqAccordion">
                        @if($faqs && $faqs->count() > 0)
                            @php $leftColumnFaqs = $faqs->take(ceil($faqs->count() / 2)); @endphp
                            @foreach($leftColumnFaqs as $index => $faq)
                                <div class="accordion-card style2">
                                    <div class="accordion-header" id="collapse-item-{{ $loop->iteration }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $loop->iteration }}" aria-expanded="false" aria-controls="collapse-{{ $loop->iteration }}">{{ $faq->question }}</button>
                                    </div>
                                    <div id="collapse-{{ $loop->iteration }}" class="accordion-collapse collapse" aria-labelledby="collapse-item-{{ $loop->iteration }}" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            <p class="faq-text">{!! nl2br(e($faq->answer)) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="accordion-card style2">
                                <div class="accordion-header" id="collapse-item-1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="false" aria-controls="collapse-1">Where can I get analytics help?</button>
                                </div>
                                <div id="collapse-1" class="accordion-collapse collapse" aria-labelledby="collapse-item-1" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">Dramatically disseminate real-time portals rather than top-line action items. Uniquely provide access to low-risk high-yield products without dynamic products. Progressively re-engineer low-risk high-yield ideas rather than emerging alignments.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-card style2 active">
                                <div class="accordion-header" id="collapse-item-2">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="true" aria-controls="collapse-2">How long should a business plan be?</button>
                                </div>
                                <div id="collapse-2" class="accordion-collapse collapse show" aria-labelledby="collapse-item-2" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">Dramatically disseminate real-time portals rather than top-line action items. Uniquely provide access to low-risk high-yield products without dynamic products. Progressively re-engineer low-risk high-yield ideas rather than emerging alignments.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-card style2">
                                <div class="accordion-header" id="collapse-item-3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">Do I need a business plan?</button>
                                </div>
                                <div id="collapse-3" class="accordion-collapse collapse" aria-labelledby="collapse-item-3" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">Dramatically disseminate real-time portals rather than top-line action items. Uniquely provide access to low-risk high-yield products without dynamic products. Progressively re-engineer low-risk high-yield ideas rather than emerging alignments.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-card style2">
                                <div class="accordion-header" id="collapse-item-4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4">How To Choose A Good QA Consultant?</button>
                                </div>
                                <div id="collapse-4" class="accordion-collapse collapse" aria-labelledby="collapse-item-4" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">Dramatically disseminate real-time portals rather than top-line action items. Uniquely provide access to low-risk high-yield products without dynamic products. Progressively re-engineer low-risk high-yield ideas rather than emerging alignments.</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="accordion-area accordion" id="faqAccordion2">
                        @if($faqs && $faqs->count() > 0)
                            @php $rightColumnFaqs = $faqs->skip(ceil($faqs->count() / 2)); @endphp
                            @foreach($rightColumnFaqs as $index => $faq)
                                <div class="accordion-card style2">
                                    <div class="accordion-header" id="collapse-item-{{ $loop->iteration + $rightColumnFaqs->count() }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $loop->iteration + $rightColumnFaqs->count() }}" aria-expanded="false" aria-controls="collapse-{{ $loop->iteration + $rightColumnFaqs->count() }}">{{ $faq->question }}</button>
                                    </div>
                                    <div id="collapse-{{ $loop->iteration + $rightColumnFaqs->count() }}" class="accordion-collapse collapse" aria-labelledby="collapse-item-{{ $loop->iteration + $rightColumnFaqs->count() }}" data-bs-parent="#faqAccordion2">
                                        <div class="accordion-body">
                                            <p class="faq-text">{!! nl2br(e($faq->answer)) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="accordion-card style2">
                                <div class="accordion-header" id="collapse-item-5">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-5" aria-expanded="false" aria-controls="collapse-5">What is off page SEO link building?</button>
                                </div>
                                <div id="collapse-5" class="accordion-collapse collapse" aria-labelledby="collapse-item-5" data-bs-parent="#faqAccordion2">
                                    <div class="accordion-body">
                                        <p class="faq-text">Dramatically disseminate real-time portals rather than top-line action items. Uniquely provide access to low-risk high-yield products without dynamic products. Progressively re-engineer low-risk high-yield ideas rather than emerging alignments.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-card style2">
                                <div class="accordion-header" id="collapse-item-6">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-6" aria-expanded="false" aria-controls="collapse-6">Best SEO Practices for Page Layouts</button>
                                </div>
                                <div id="collapse-6" class="accordion-collapse collapse" aria-labelledby="collapse-item-6" data-bs-parent="#faqAccordion2">
                                    <div class="accordion-body">
                                        <p class="faq-text">Dramatically disseminate real-time portals rather than top-line action items. Uniquely provide access to low-risk high-yield products without dynamic products. Progressively re-engineer low-risk high-yield ideas rather than emerging alignments.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-card style2">
                                <div class="accordion-header" id="collapse-item-7">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-7" aria-expanded="false" aria-controls="collapse-7">How can I order web design for my website?</button>
                                </div>
                                <div id="collapse-7" class="accordion-collapse collapse" aria-labelledby="collapse-item-7" data-bs-parent="#faqAccordion2">
                                    <div class="accordion-body">
                                        <p class="faq-text">Dramatically disseminate real-time portals rather than top-line action items. Uniquely provide access to low-risk high-yield products without dynamic products. Progressively re-engineer low-risk high-yield ideas rather than emerging alignments.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-card style2">
                                <div class="accordion-header" id="collapse-item-8">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-8" aria-expanded="false" aria-controls="collapse-8">Outsourced IT Services For Small Business?</button>
                                </div>
                                <div id="collapse-8" class="accordion-collapse collapse" aria-labelledby="collapse-item-8" data-bs-parent="#faqAccordion2">
                                    <div class="accordion-body">
                                        <p class="faq-text">Dramatically disseminate real-time portals rather than top-line action items. Uniquely provide access to low-risk high-yield products without dynamic products. Progressively re-engineer low-risk high-yield ideas rather than emerging alignments.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-card style2">
                                <div class="accordion-header" id="collapse-item-9">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-9" aria-expanded="false" aria-controls="collapse-9">Digital solution for your startup agency?</button>
                                </div>
                                <div id="collapse-9" class="accordion-collapse collapse" aria-labelledby="collapse-item-9" data-bs-parent="#faqAccordion2">
                                    <div class="accordion-body">
                                        <p class="faq-text">Dramatically disseminate real-time portals rather than top-line action items. Uniquely provide access to low-risk high-yield products without dynamic products. Progressively re-engineer low-risk high-yield ideas rather than emerging alignments.</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
    Contact Area  
    ==============================-->
    <div class="space" id="contact-sec" data-bg-src="{{ asset('assets_frontend/assets/img/bg/form_bg_1.jpg') }}">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title">
                    <div class="icon-masking me-2">
                        <span class="mask-icon" data-mask-src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_2.svg') }}"></span>
                        <img src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_2.svg') }}" alt="shape">
                    </div>
                    GET A QUOTE
                </span>
                <h2 class="sec-title">Request A Free <span class="text-theme">Consultation</span></h2>
            </div>
            <form action="mail.php" method="POST" class="quote-form ajax-contact">
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name">
                        <i class="fal fa-user"></i>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email">
                        <i class="fal fa-envelope"></i>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="tel" class="form-control" name="number" id="number" placeholder="Phone number">
                        <i class="fal fa-phone"></i>
                    </div>
                    <div class="form-group col-md-6">
                        <select name="subject" id="subject" class="form-select">
                            <option value="" disabled selected hidden>Select Subject</option>
                            <option value="IT Consult">IT Consult</option>
                            <option value="UI/UX Design">UI/UX Design</option>
                            <option value="Branding Solution">Branding Solution</option>
                            <option value="Product Marketing">Product Marketing</option>
                        </select>
                        <i class="fal fa-file-lines"></i>
                    </div>
                    <div class="form-group col-12">
                        <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Write Your Message"></textarea>
                        <i class="fal fa-pencil"></i>
                    </div>
                    <div class="form-btn text-center col-12">
                        <button class="th-btn">Send Message<i class="fa-regular fa-arrow-right ms-2"></i></button>
                    </div>
                </div>
                <p class="form-messages mb-0 mt-3"></p>
            </form>
        </div>
    </div>

@endsection
