 @extends('frontend2')

 @section('content')
     @include('frontend.partials.breadcrumb', [
        'title' => 'Our Teams',
        'bgImage' => !empty($pageSettings?->breadcrumb_image)
            ? 'storage/' . $pageSettings->breadcrumb_image
            : 'assets_frontend/assets/img/bg/breadcumb-bg.jpg',
        'breadcrumb' => [['label' => 'All Teams']],
    ])

     @if($teams->count() > 0)
     <section class="space-top">
         <div class="container">
             <div class="row gy-40 align-items-center">
                 <div class="col-xl-5">
                     <div class="team-featured-img">
                         @if($teams->first()->image)
                             <img src="{{ asset('storage/' . $teams->first()->image) }}"
                                alt="{{ $teams->first()->name }}"
                                style="width: 100%; height: 468px; object-fit: cover;">
                         @else
                             <div class="d-flex flex-column align-items-center justify-content-center text-white rounded" 
                                  style="width: 100%; height: 468px; background: linear-gradient(135deg, var(--theme-color, #667eea) 0%, var(--theme-color, #764ba2) 60%, #2d3748 100%);">
                                 <div class="bg-white bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center mb-3 border border-white border-opacity-30"
                                      style="width: 120px; height: 120px;">
                                     <i class="fas fa-user" style="font-size: 3rem; color: rgba(255,255,255,0.9);"></i>
                                 </div>
                                 <h4 class="text-white fw-bold mb-2">{{ $teams->first()->name }}</h4>
                                 <p class="text-white-50">{{ $teams->first()->position }}</p>
                             </div>
                         @endif
                     </div>
                 </div>
                 <div class="col-xl-7">
                     <div class="team-featured">
                         <h2 class="team-title">{{ $teams->first()->name }}</h2>
                         <p class="team-desig">{{ $teams->first()->position }}@if($teams->first()->company), of {{ $teams->first()->company }}@endif</p>
                         <p class="team-bio">{{ $teams->first()->bio ?: 'Enthusiastically parallel task 2.0 niches wherea end-to-end strategic theme area. Dramatically harness e-business ROI and granular service. Quickly target enabled internal organic sources after cross-unit methods of empowerment.' }}</p>
                         <div class="team-contact-wrap">
                             @if($teams->first()->phone)
                             <div class="team-contact">
                                 <div class="icon-btn"><i class="fa-solid fa-phone"></i></div>
                                 <div class="media-body">
                                     <h6 class="team-contact_label">Phone Number</h6>
                                     <a class="team-contact_link" href="tel:{{ $teams->first()->phone }}">{{ $teams->first()->phone }}</a>
                                 </div>
                             </div>
                             @endif
                             @if($teams->first()->email)
                             <div class="team-contact">
                                 <div class="icon-btn"><i class="fa-solid fa-envelope"></i></div>
                                 <div class="media-body">
                                     <h6 class="team-contact_label">Email Address</h6>
                                     <a class="team-contact_link" href="mailto:{{ $teams->first()->email }}">{{ $teams->first()->email }}</a>
                                 </div>
                             </div>
                             @endif
                             @if($teams->first()->availability)
                             <div class="team-contact">
                                 <div class="icon-btn"><i class="fa-solid fa-clock"></i></div>
                                 <div class="media-body">
                                     <h6 class="team-contact_label">Available Time</h6>
                                     <span class="team-contact_link">{{ $teams->first()->availability }}</span>
                                 </div>
                             </div>
                             @endif
                         </div>
                         <!-- <a href="{{ route('frontend.team.details', $teams->first()->id) }}" class="th-btn">VIEW PROFILE<i -->
                         <a href="{{ url('about') }}" class="th-btn">MAKE AN APPOINTMENT<i
                                 class="fa-regular fa-arrow-right ms-2"></i></a>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     @endif

     <section class="space">
         <div class="container">
             <div class="title-area text-center">
                 <span class="sub-title">
                     <div class="icon-masking me-2">
                         <span class="mask-icon"
                             data-mask-src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_1.svg') }}"></span>
                         <img src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_1.svg') }}" alt="shape">
                     </div>
                     ALL MEMBERS
                 </span>
                 <h2 class="sec-title">See Our Skilled Expert <span class="text-theme">Team</span></h2>
             </div>
             <div class="row gy-40">
                 @foreach ($teams as $index => $team)
                     @if($index > 0) {{-- Skip index 0 karena sudah ditampilkan di featured section --}}
                     <!-- Single Item -->
                     <div class="col-lg-3 col-md-6">
                         <div class="th-team team-card">
                             <div class="team-img">
                                 @if($team->image)
                                     <img src="{{ asset('storage/' . $team->image) }}" 
                                          alt="{{ $team->name }}" 
                                          style="width: 100%; height: 320px; object-fit: cover;">
                                 @else
                                     <div class="d-flex flex-column align-items-center justify-content-center text-white" 
                                          style="width: 100%; height: 320px; background: linear-gradient(135deg, var(--theme-color, #667eea) 0%, var(--theme-color, #764ba2) 60%, #2d3748 100%);">
                                         <div class="bg-white bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center mb-3 border border-white border-opacity-30"
                                              style="width: 80px; height: 80px;">
                                             <i class="fas fa-user fs-1 text-secondary"></i>
                                         </div>
                                         <h6 class="text-white fw-semibold mb-1">{{ $team->name }}</h6>
                                         <span class="text-white-50 small">{{ $team->position }}</span>
                                     </div>
                                 @endif
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
                                     
                                     <!-- Fallback jika tidak ada social media, tampilkan default links -->
                                     @if(!$team->facebook && !$team->twitter && !$team->instagram && !$team->linkedin)
                                         <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
                                         <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
                                         <a target="_blank" href="#"><i class="fab fa-instagram"></i></a>
                                         <a target="_blank" href="#"><i class="fab fa-linkedin-in"></i></a>
                                     @endif
                                 </div>
                                 <h3 class="box-title">
                                     <a href="{{ route('frontend.team.details', $team->id) }}">{{ $team->name }}</a>
                                 </h3>
                                 <span class="team-desig">{{ $team->position }}</span>
                             </div>
                         </div>
                     </div>
                     @endif {{-- End skip index 0 check --}}
                 @endforeach
             </div>
         </div>
     </section>

 @endsection
