<!--==============================
Testimonial Area
==============================-->
<section class="bg-auto space" data-bg-src="{{ asset('assets_frontend/assets/img/bg/testi_bg_2.png') }}">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title">
                <div class="icon-masking me-2">
                    <span class="mask-icon"
                        data-mask-src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_2.svg') }}"></span>
                    <img src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_2.svg') }}" alt="shape">
                </div>
                {{ $subtitle ?? 'CUSTOMER FEEDBACK' }}
            </span>
            <h2 class="sec-title">{{ $titleBlack ?? 'What Happy Clients Says' }} <br> <span class="text-theme fw-normal">{{ $titleBlue ?? 'About Us?' }}</span>
            </h2>
        </div>

        <div class="slider-area">
            <div class="swiper th-slider has-shadow" id="{{ $sliderId ?? 'testiSlider2' }}"
                data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"1"},"1200":{"slidesPerView":"2"}}}'>
                <div class="swiper-wrapper">
                    @if(isset($testimonials) && $testimonials->count() > 0)
                        @foreach($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="testi-box">
                                    <div class="testi-box_img">
                                        <img src="{{ isset($testimonial->image) && $testimonial->image ? asset('storage/' . $testimonial->image) : asset('assets_frontend/assets/img/testimonial/testi_2_1.jpg') }}"
                                            alt="Avatar">
                                        <div class="testi-box_quote">
                                            <img src="{{ asset('assets_frontend/assets/img/icon/quote_left_2.svg') }}"
                                                alt="quote">
                                        </div>
                                    </div>
                                    <div class="testi-box_content">
                                        <p class="testi-box_text text-wrap" style="word-break: break-word; overflow-wrap: break-word; max-width: 100%;">{{ $testimonial->review }}</p>
                                        <div class="testi-box_review">
                                            @for ($s = 0; $s < $testimonial->rating; $s++)
                                                <i class="fa-solid fa-star-sharp"></i>
                                            @endfor
                                        </div>
                                        <h3 class="box-title">{{ $testimonial->name }}</h3>
                                        <p class="testi-box_desig">{{ $testimonial->position }}@if($testimonial->company) at {{ $testimonial->company }}@endif</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Default testimonials when no testimonials available -->
                        @php
                            $defaultTestimonials = [
                                ['name' => 'David Farnandes', 'company' => 'Anaton', 'image' => 'testi_2_1.jpg', 'position' => 'CEO', 'review' => 'Objectively visualize error-free technology for B2B alignment. Monotonectally harness an expanded array of models via effective collaboration.', 'rating' => 5],
                                ['name' => 'Jackline Techie', 'company' => 'Kormola', 'image' => 'testi_2_2.jpg', 'position' => 'CEO', 'review' => 'Objectively visualize error-free technology for B2B alignment. Monotonectally harness an expanded array of models via effective collaboration.', 'rating' => 5],
                                ['name' => 'Abraham Khalil', 'company' => 'Rimasu', 'image' => 'testi_2_3.jpg', 'position' => 'CEO', 'review' => 'Objectively visualize error-free technology for B2B alignment. Monotonectally harness an expanded array of models via effective collaboration.', 'rating' => 5]
                            ];
                        @endphp
                        @foreach ($defaultTestimonials as $testimonial)
                            @for ($i = 0; $i < 2; $i++)
                                <div class="swiper-slide">
                                    <div class="testi-box">
                                        <div class="testi-box_img">
                                            <img src="{{ asset('assets_frontend/assets/img/testimonial/' . $testimonial['image']) }}"
                                                alt="Avatar">
                                            <div class="testi-box_quote">
                                                <img src="{{ asset('assets_frontend/assets/img/icon/quote_left_2.svg') }}"
                                                    alt="quote">
                                            </div>
                                        </div>
                                        <div class="testi-box_content">
                                            <p class="testi-box_text">{{ $testimonial['review'] }}</p>
                                            <div class="testi-box_review">
                                                @for ($s = 0; $s < $testimonial['rating']; $s++)
                                                    <i class="fa-solid fa-star-sharp"></i>
                                                @endfor
                                            </div>
                                            <h3 class="box-title">{{ $testimonial['name'] }}</h3>
                                            <p class="testi-box_desig">{{ $testimonial['position'] }} at {{ $testimonial['company'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        @endforeach
                    @endif
                </div>
            </div>
            <button data-slider-prev="#{{ $sliderId ?? 'testiSlider2' }}" class="slider-arrow style3 slider-prev"><i
                    class="far fa-arrow-left"></i></button>
            <button data-slider-next="#{{ $sliderId ?? 'testiSlider2' }}" class="slider-arrow style3 slider-next"><i
                    class="far fa-arrow-right"></i></button>
        </div>
    </div>
    <div class="shape-mockup moving d-none d-xl-block" data-bottom="0%" data-left="10%">
        <img src="{{ asset('assets_frontend/assets/img/shape/line_1.png') }}" alt="shape">
    </div>
    <div class="shape-mockup jump d-none d-xl-block" data-top="20%" data-right="2%">
        <img src="{{ asset('assets_frontend/assets/img/shape/line_2.png') }}" alt="shape">
    </div>
</section>
