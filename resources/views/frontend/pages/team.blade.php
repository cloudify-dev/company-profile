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
                 @foreach ($teams as $team)
                     <div class="col-lg-3 col-md-6">
                         <div class="th-team team-card">
                             <div class="team-img">
                                 <img src="{{ asset('storage/' . $team->image) }}" alt="{{ $team->name }}">
                             </div>
                             <div class="team-content">
                                 <h3 class="box-title">
                                     <a href="{{ route('frontend.team.details', $team->id) }}">{{ $team->name }}</a>
                                 </h3>
                                 <span class="team-desig">{{ $team->position }}</span>
                             </div>
                         </div>
                     </div>
                 @endforeach
             </div>
         </div>
     </section>
 @endsection
