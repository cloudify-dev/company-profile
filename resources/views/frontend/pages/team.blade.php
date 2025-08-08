 @extends('frontend2')

 @section('content')
     <!--==============================
                                    Breadcumb
                                ============================== -->
     @include('frontend.partials.breadcrumb', [
         'title' => 'Our Team',
         'bgImage' => !empty($pageSettings?->breadcrumb_image)
             ? 'storage/' . $pageSettings->breadcrumb_image
             : 'assets_frontend/assets/img/bg/breadcumb-bg.jpg',
         'breadcrumb' => [['label' => 'Our Team']],
     ])


     <div class="container">
         <div class="breadcumb-content">
             <h1 class="breadcumb-title">Our Team</h1>
             <ul class="breadcumb-menu">
                 <li><a href="{{ url('/') }}">Home</a></li>
                 <li>Our Team</li>
             </ul>
         </div>
     </div>
     </div>

     {{-- <!--==============================
        Team Area
    ==============================-->
     <section class="space-top">
         <div class="container">
             <div class="row gy-40 align-items-center">
                 <div class="col-xl-5">
                     <div class="team-featured-img">
                         <img src="{{ asset('assets_frontend/assets/img/team/team_featured.jpg') }}" alt="Team">
                     </div>
                 </div>
                 <div class="col-xl-7">
                     <div class="team-featured">
                         <h2 class="team-title">Rachna Sheth</h2>
                         <p class="team-desig">CEO, of Webteck Company</p>
                         <p class="team-bio">Enthusiastically parallel task 2.0 niches wherea end-to-end strategic theme
                             area...</p>
                         <div class="team-contact-wrap">
                             <div class="team-contact">
                                 <div class="icon-btn"><i class="fa-solid fa-phone"></i></div>
                                 <div class="media-body">
                                     <h6 class="team-contact_label">Phone Number</h6>
                                     <a class="team-contact_link" href="tel:+19356542587">+1 935-654-2587</a>
                                 </div>
                             </div>
                             <div class="team-contact">
                                 <div class="icon-btn"><i class="fa-solid fa-envelope"></i></div>
                                 <div class="media-body">
                                     <h6 class="team-contact_label">Email Address</h6>
                                     <a class="team-contact_link" href="mailto:info@rachna.com">info@rachna.com</a>
                                 </div>
                             </div>
                             <div class="team-contact">
                                 <div class="icon-btn"><i class="fa-solid fa-phone"></i></div>
                                 <div class="media-body">
                                     <h6 class="team-contact_label">Available Time</h6>
                                     <span class="team-contact_link">10:00AM - 4:00PM</span>
                                 </div>
                             </div>
                         </div>
                         <a href="{{ url('about') }}" class="th-btn">MAKE AN APPOINTMENT<i
                                 class="fa-regular fa-arrow-right ms-2"></i></a>
                     </div>
                 </div>
             </div>
         </div>
     </section> --}}

     <section class="space">
         <div class="container">
             <div class="title-area text-center mb-5">
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

             <div class="row g-4">
                 @foreach ($teams as $team)
                     <div class="col-xl-3 col-lg-4 col-md-6">
                         <div class="card border-0 shadow-sm h-100 team-card-modern">
                             <div class="position-relative overflow-hidden">
                                 @if($team->image)
                                     <img src="{{ asset('storage/' . $team->image) }}" 
                                          class="card-img-top team-img" 
                                          alt="{{ $team->name }}"
                                          style="height: 280px; object-fit: cover;">
                                 @else
                                     <div class="card-img-top d-flex align-items-center justify-content-center team-img-placeholder"
                                          style="height: 280px; background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
                                         <div class="text-center">
                                             <div class="bg-white rounded-circle d-flex align-items-center justify-content-center mb-3 mx-auto" 
                                                  style="width: 80px; height: 80px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
                                                 <i class="fas fa-user fa-2x text-muted"></i>
                                             </div>
                                             <h6 class="mb-0 text-dark fw-bold">{{ $team->name }}</h6>
                                         </div>
                                     </div>
                                 @endif
                                 
                                 <!-- Hover Overlay -->
                                 <div class="team-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                                     <a href="{{ route('frontend.team.details', $team->id) }}" 
                                        class="btn btn-light btn-lg rounded-circle shadow-lg">
                                         <i class="fas fa-arrow-right"></i>
                                     </a>
                                 </div>
                             </div>
                             
                             <div class="card-body text-center p-4">
                                 <h5 class="card-title mb-2">
                                     <a href="{{ route('frontend.team.details', $team->id) }}" 
                                        class="text-decoration-none text-dark fw-bold team-name-link">
                                         {{ $team->name }}
                                     </a>
                                 </h5>
                                 <p class="text-muted mb-2 fw-medium">{{ $team->position }}</p>
                                 @if($team->company)
                                     <p class="text-secondary small mb-3">{{ $team->company }}</p>
                                 @endif
                                 
                                 <!-- Contact Info -->
                                 @if($team->email || $team->phone)
                                     <div class="d-flex justify-content-center gap-3 mt-3">
                                         @if($team->email)
                                             <a href="mailto:{{ $team->email }}" 
                                                class="text-muted hover-theme" 
                                                title="Email {{ $team->name }}">
                                                 <i class="fas fa-envelope"></i>
                                             </a>
                                         @endif
                                         @if($team->phone)
                                             <a href="tel:{{ $team->phone }}" 
                                                class="text-muted hover-theme" 
                                                title="Call {{ $team->name }}">
                                                 <i class="fas fa-phone"></i>
                                             </a>
                                         @endif
                                     </div>
                                 @endif
                             </div>
                         </div>
                     </div>
                 @endforeach
             </div>
         </div>
     </section>

     <style>
     .team-card-modern {
         transition: all 0.3s ease;
         border-radius: 15px !important;
         overflow: hidden;
     }
     
     .team-card-modern:hover {
         transform: translateY(-10px);
         box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
     }
     
     .team-card-modern .team-img {
         transition: transform 0.3s ease;
         border-radius: 15px 15px 0 0;
     }
     
     .team-card-modern:hover .team-img {
         transform: scale(1.05);
     }
     
     .team-overlay {
         background: rgba(0,0,0,0.6);
         opacity: 0;
         transition: opacity 0.3s ease;
     }
     
     .team-card-modern:hover .team-overlay {
         opacity: 1;
     }
     
     .team-name-link {
         transition: color 0.3s ease;
     }
     
     .team-name-link:hover {
         color: var(--theme-color) !important;
     }
     
     .hover-theme {
         transition: color 0.3s ease;
     }
     
     .hover-theme:hover {
         color: var(--theme-color) !important;
     }
     
     .team-img-placeholder {
         border-radius: 15px 15px 0 0;
     }
     
     @media (max-width: 768px) {
         .team-card-modern .card-body {
             padding: 1.5rem !important;
         }
     }
     </style>
 @endsection
