@extends('frontend2')

@section('content')
    @include('frontend.partials.breadcrumb', [
        'title' => 'Project Details',
        'bgImage' => !empty($pageSettings?->breadcrumb_image)
            ? 'storage/' . $pageSettings->breadcrumb_image
            : 'assets_frontend/assets/img/bg/breadcumb-bg.jpg',
        'breadcrumb' => [['url' => route('project'), 'label' => 'Home'], ['label' => 'Project Details']],
    ])

    <section class="space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-8">
                    <div class="page-single">
                        <div class="page-img">
                            @if($project->image && file_exists(public_path('storage/' . $project->image)))
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                            @else
                                <img src="{{ asset('assets_frontend/assets/img/project/project_details.jpg') }}" alt="Project Image">
                            @endif
                        </div>
                        <div class="page-content">
                            <h2 class="h3 page-title">{{ $project->title }}</h2>
                            <p class="">{{ $project->description ?: 'Interactively implement top-line ROI vis-a-vis 24/7 e-markets. Assertively communicate web-enabled catalysts for change through low-risk high-yield functionalities. Quickly optimize maintainable data for virtual interfaces. Phosfluorescently monetize cost effective ROI before leveraged sources. Holisticly envisioneer technically sound imperatives without just in time networks.' }}</p>

                            <div class="project-inner-box mb-40">
                                <h3 class="box-title">The challenge of project</h3>
                                <p class="">{{ $project->challenges ?: 'Authoritatively scale business meta-services before client-based technologies. Collaboratively strategize synergistic scenarios rather than flexible action items. Continually deliver market positioning convergence and mission-critical infrastructures.' }}</p>
                                <div class="row gy-4 align-items-center">
                                    @if($project->challenge_image && file_exists(public_path('storage/' . $project->challenge_image)))
                                        <div class="col-md-5">
                                            <img class="w-100 rounded-3" src="{{ asset('storage/' . $project->challenge_image) }}" alt="project">
                                        </div>
                                    @endif
                                    <div class="col-md-7">
                                        <div class="checklist">
                                            <ul>
                                                @if($project->challenge_points && count($project->challenge_points) > 0)
                                                    @foreach($project->challenge_points as $point)
                                                        <li><i class="fas fa-badge-check"></i> {{ $point }}</li>
                                                    @endforeach
                                                @else
                                                    <li><i class="fas fa-badge-check"></i> It is a long established fact that reader will</li>
                                                    <li><i class="fas fa-badge-check"></i> There are many variations of passages</li>
                                                    <li><i class="fas fa-badge-check"></i> All the Lorem Ipsum generators</li>
                                                    <li><i class="fas fa-badge-check"></i> Asearch for 'lorem ipsum' will uncover many</li>
                                                    <li><i class="fas fa-badge-check"></i> injected humour words which</li>
                                                    <li><i class="fas fa-badge-check"></i> There are many variations of passages of</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="project-inner-box">
                                <h3 class="box-title">The result of project</h3>
                                <p class="mb-3">{{ $project->results ?: 'Objectively utilize client-based e-service after corporate niche markets. Dynamically morph compelling channels vis-a-vis multifunctional interfaces. Credibly administrate wireless opportunities after B2B materials. Phosfluorescently engineer flexible "outside the box" thinking through process-centric web services. Progressively target multidisciplinary.' }}</p>
                                <div class="row gy-4 align-items-center">
                                    @if($project->result_images && count($project->result_images) > 0)
                                        @foreach($project->result_images as $index => $resultImage)
                                            <div class="col-md-6">
                                                <img class="w-100 rounded-3" src="{{ asset('storage/' . $resultImage) }}" alt="project">
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="col-md-6">
                                            <img class="w-100 rounded-3" src="{{ asset('assets_frontend/assets/img/project/project_inner_2.jpg') }}" alt="project">
                                        </div>
                                        <div class="col-md-6">
                                            <img class="w-100 rounded-3" src="{{ asset('assets_frontend/assets/img/project/project_inner_3.jpg') }}" alt="project">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-4">
                    <aside class="sidebar-area">
                        <div class="widget widget_info">
                            <h3 class="widget_title">Project Information</h3>
                            <div class="project-info-list">
                                <div class="contact-feature">
                                    <div class="icon-btn">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                    <div class="media-body">
                                        <p class="contact-feature_label">Clients:</p>
                                        <a href="#" class="contact-feature_link">{{ $project->client ?: 'David Jackson' }}</a>
                                    </div>
                                </div>
                                <div class="contact-feature">
                                    <div class="icon-btn">
                                        <i class="fa-solid fa-folder-open"></i>
                                    </div>
                                    <div class="media-body">
                                        <p class="contact-feature_label">Category:</p>
                                        <a href="#" class="contact-feature_link">{{ $project->category ?: 'IT Technology' }}</a>
                                    </div>
                                </div>
                                <div class="contact-feature">
                                    <div class="icon-btn">
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
                                    <div class="media-body">
                                        <p class="contact-feature_label">Date</p>
                                        <span class="contact-feature_link">{{ $project->completion_date ? $project->completion_date->format('d M, Y') : '20 Sep, 2024' }}</span>
                                    </div>
                                </div>
                                <div class="contact-feature">
                                    <div class="icon-btn">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <div class="media-body">
                                        <p class="contact-feature_label">Address:</p>
                                        <a href="#" class="contact-feature_link">{{ $project->location ?: '55 Main Address, USA' }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget widget_download">
                            <h4 class="widget_title">Download Brochure</h4>
                            <div class="download-widget-wrap">
                                @if($project->brochure_pdf)
                                    <a href="{{ asset('storage/' . $project->brochure_pdf) }}" target="_blank" class="th-btn">
                                        <i class="fa-light fa-file-pdf me-2"></i>DOWNLOAD PDF
                                    </a>
                                @else
                                    <a href="#" class="th-btn disabled" style="opacity: 0.5; pointer-events: none;">
                                        <i class="fa-light fa-file-pdf me-2"></i>PDF NOT AVAILABLE
                                    </a>
                                @endif
                                @if($project->brochure_doc)
                                    <a href="{{ asset('storage/' . $project->brochure_doc) }}" target="_blank" class="th-btn style5">
                                        <i class="fa-light fa-file-lines me-2"></i>DOWNLOAD DOC
                                    </a>
                                @else
                                    <a href="#" class="th-btn style5 disabled" style="opacity: 0.5; pointer-events: none;">
                                        <i class="fa-light fa-file-lines me-2"></i>DOC NOT AVAILABLE
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="widget widget_banner" 
                             @if($project->help_banner_image && file_exists(public_path('storage/' . $project->help_banner_image)))
                                data-bg-src="{{ asset('storage/' . $project->help_banner_image) }}"
                             @else
                                data-bg-src="{{ asset('assets_frontend/assets/img/bg/widget_banner.jpg') }}"
                             @endif>
                            <div class="widget-banner">
                                <span class="text">CONTACT US NOW</span>
                                <h2 class="title">You Need Help?</h2>
                                <a href="#" class="th-btn style3">GET A QUOTE<i class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    
@endsection
                                   