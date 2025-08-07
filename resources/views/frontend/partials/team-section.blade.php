<!--==============================
Team Area
==============================-->
<section class="team-sec space">
    <div class="container z-index-common">
        <div class="title-area text-center">
            <span class="sub-title">
                <div class="icon-masking me-2">
                    <span class="mask-icon" data-mask-src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_1.svg') }}"></span>
                    <img src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_1.svg') }}" alt="shape">
                </div>
                {{ $subtitle ?? 'TEAM MEMBER' }}
            </span>
            <h2 class="sec-title">{{ $titleBlack ?? 'See Our Skilled Expert' }} <span class="text-theme">{{ $titleBlue ?? 'Team' }}</span></h2>
        </div>

        <div class="slider-area">
            <div class="swiper th-slider has-shadow" id="{{ $sliderId ?? 'teamSlider2' }}"
                data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}'>
                <div class="swiper-wrapper">
                    @if(isset($teams) && $teams->count() > 0)
                        @foreach($teams as $team)
                            <!-- Single Item -->
                            <div class="swiper-slide">
                                <div class="th-team team-card">
                                    <div class="team-img">
                                        <img src="{{ asset('storage/' . $team->image) }}" alt="{{ $team->name }}">
                                    </div>
                                    <div class="team-content">
                                        <div class="box-particle" id="team-p{{ $loop->iteration }}"></div>
                                        <div class="team-social">
                                            @if($team->facebook)
                                                <a target="_blank" href="{{ $team->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                            @endif
                                            @if($team->twitter)
                                                <a target="_blank" href="{{ $team->twitter }}"><i class="fab fa-twitter"></i></a>
                                            @endif
                                            @if($team->instagram)
                                                <a target="_blank" href="{{ $team->instagram }}"><i class="fab fa-instagram"></i></a>
                                            @endif
                                            @if($team->linkedin)
                                                <a target="_blank" href="{{ $team->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                                            @endif
                                        </div>
                                        <h3 class="box-title">
                                            @if(isset($showDetailsLink) && $showDetailsLink)
                                                <a href="{{ route('frontend.team.details', $team->id) }}">{{ $team->name }}</a>
                                            @else
                                                <a href="#">{{ $team->name }}</a>
                                            @endif
                                        </h3>
                                        <span class="team-desig">{{ $team->position }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Default Single Item when no teams available -->
                        <div class="swiper-slide">
                            <div class="th-team team-card">
                                <div class="team-img">
                                    <img src="{{ asset('assets_frontend/assets/img/team/team_1_1.jpg') }}" alt="Team">
                                </div>
                                <div class="team-content">
                                    <div class="box-particle" id="team-p1"></div>
                                    <div class="team-social">
                                        <a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                        <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                        <a target="_blank" href="https://instagram.com/"><i class="fab fa-instagram"></i></a>
                                        <a target="_blank" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                    <h3 class="box-title"><a href="#">Rayan Athels</a></h3>
                                    <span class="team-desig">Founder & CEO</span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <button data-slider-prev="#{{ $sliderId ?? 'teamSlider2' }}" class="slider-arrow style3 slider-prev"><i class="far fa-arrow-left"></i></button>
            <button data-slider-next="#{{ $sliderId ?? 'teamSlider2' }}" class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>
        </div>
    </div>
    <div class="shape-mockup" data-bottom="0" data-left="0">
        <div class="particle-2" id="particle-2"></div>
    </div>
</section>
