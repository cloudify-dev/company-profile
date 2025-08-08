@extends('frontend2')

@section('content')
    {{-- BREADCRUMB --}}
    @include('frontend.partials.breadcrumb', [
        'title' => 'Project Details',
        'bgImage' => !empty($pageSettings?->breadcrumb_image)
            ? 'storage/' . $pageSettings->breadcrumb_image
            : 'assets_frontend/assets/img/bg/breadcumb-bg.jpg',
        'breadcrumb' => [['url' => url('/project'), 'label' => 'All Projects'], ['label' => $project->title]],
    ])

    <!--==============================
                                            Project Area
                                        ==============================-->
    <section class="space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-8">
                    <div class="page-single">
                        <div class="page-img position-relative">
                            @if($project->image && file_exists(public_path('storage/' . $project->image)))
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-100 rounded">
                            @else
                                <div class="w-100 bg-light d-flex align-items-center justify-content-center rounded" style="height: 300px;">
                                    <div class="text-center text-muted">
                                        <i class="fas fa-image fa-4x mb-3"></i>
                                        <h5>No Project Image</h5>
                                        <p class="mb-0">Image not available for this project</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="page-content">
                            <div class="project-header mb-4 pb-4 border-bottom">
                                <div class="d-flex justify-content-between align-items-start flex-wrap">
                                    <div class="flex-grow-1">
                                        <h2 class="h3 page-title">{{ $project->title }}</h2>
                                        <div class="d-flex gap-2 mt-2">
                                            <span class="badge bg-primary">{{ $project->category }}</span>
                                            @if($project->featured)
                                                <span class="badge bg-warning text-dark">
                                                    <i class="fas fa-star me-1"></i>Featured
                                                </span>
                                            @endif
                                            @if($project->status)
                                                <span class="badge bg-{{ $project->status == 'completed' ? 'success' : ($project->status == 'ongoing' ? 'primary' : 'secondary') }}">
                                                    <i class="fas fa-{{ $project->status == 'completed' ? 'check-circle' : ($project->status == 'ongoing' ? 'clock' : 'calendar') }} me-1"></i>
                                                    {{ ucfirst($project->status) }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    @if($project->demo_url)
                                        <div class="project-links mt-3 mt-md-0">
                                            <a href="{{ $project->demo_url }}" target="_blank" class="th-btn style3">
                                                <i class="fas fa-external-link-alt me-2"></i>Live Demo
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="project-description mb-4">
                                <p class="lead">{{ $project->description }}</p>
                            </div>

                            @if($project->technologies)
                            <div class="bg-light p-4 rounded mb-4">
                                <h3 class="h5 mb-3">Technologies Used</h3>
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach(json_decode($project->technologies, true) ?: [] as $tech)
                                        <span class="badge bg-primary">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            @if($project->challenges)
                            <div class="bg-light p-4 rounded mb-4">
                                <h3 class="h5 mb-3">Project Challenges</h3>
                                <p>{{ $project->challenges }}</p>
                                <div class="row gy-4 align-items-center mt-3">
                                    <div class="col-md-5">
                                        <img class="w-100 rounded"
                                            src="{{ asset('assets_frontend/assets/img/project/project_inner_1.jpg') }}"
                                            alt="project challenge">
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="list-unstyled">
                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Complex system integration requirements</li>
                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> High performance and scalability needs</li>
                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Security and data protection compliance</li>
                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> User experience optimization</li>
                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Cross-platform compatibility</li>
                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Real-time functionality implementation</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if($project->solutions)
                            <div class="bg-light p-4 rounded mb-4">
                                <h3 class="h5 mb-3">Our Solutions</h3>
                                <p class="mb-3">{{ $project->solutions }}</p>
                                <div class="row gy-4 align-items-center">
                                    <div class="col-md-6">
                                        <img class="w-100 rounded"
                                            src="{{ asset('assets_frontend/assets/img/project/project_inner_2.jpg') }}"
                                            alt="project solution">
                                    </div>
                                    <div class="col-md-6">
                                        <img class="w-100 rounded"
                                            src="{{ asset('assets_frontend/assets/img/project/project_inner_3.jpg') }}"
                                            alt="project result">
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if($project->results)
                            <div class="bg-light p-4 rounded mb-4">
                                <h3 class="h5 mb-3">Project Results</h3>
                                <p>{{ $project->results }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-4">
                    <aside class="sidebar-area">
                        <div class="widget widget_info">
                            <h3 class="widget_title">Project Information</h3>
                            <div class="project-info-list">
                                @if($project->client_name)
                                <div class="contact-feature mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-btn me-3"><i class="fa-solid fa-user"></i></div>
                                        <div>
                                            <p class="mb-1 fw-bold">Client:</p>
                                            <span class="text-muted">{{ $project->client_name }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                
                                <div class="contact-feature mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-btn me-3"><i class="fa-solid fa-folder-open"></i></div>
                                        <div>
                                            <p class="mb-1 fw-bold">Category:</p>
                                            <span class="text-muted">{{ $project->category }}</span>
                                        </div>
                                    </div>
                                </div>
                                
                                @if($project->start_date)
                                <div class="contact-feature mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-btn me-3"><i class="fa-solid fa-calendar-plus"></i></div>
                                        <div>
                                            <p class="mb-1 fw-bold">Start Date:</p>
                                            <span class="text-muted">{{ \Carbon\Carbon::parse($project->start_date)->format('d M, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                
                                @if($project->completion_date)
                                <div class="contact-feature mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-btn me-3"><i class="fa-solid fa-calendar-check"></i></div>
                                        <div>
                                            <p class="mb-1 fw-bold">Completion Date:</p>
                                            <span class="text-muted">{{ \Carbon\Carbon::parse($project->completion_date)->format('d M, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                
                                @if($project->duration)
                                <div class="contact-feature mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-btn me-3"><i class="fa-solid fa-clock"></i></div>
                                        <div>
                                            <p class="mb-1 fw-bold">Duration:</p>
                                            <span class="text-muted">{{ $project->duration }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                
                                @if($project->team_size)
                                <div class="contact-feature mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-btn me-3"><i class="fa-solid fa-users"></i></div>
                                        <div>
                                            <p class="mb-1 fw-bold">Team Size:</p>
                                            <span class="text-muted">{{ $project->team_size }} Members</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                
                                @if($project->budget_range)
                                <div class="contact-feature mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-btn me-3"><i class="fa-solid fa-dollar-sign"></i></div>
                                        <div>
                                            <p class="mb-1 fw-bold">Budget Range:</p>
                                            <span class="text-muted">{{ $project->budget_range }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                
                                <div class="contact-feature">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-btn me-3"><i class="fa-solid fa-chart-line"></i></div>
                                        <div>
                                            <p class="mb-1 fw-bold">Status:</p>
                                            <span class="badge bg-{{ $project->status == 'completed' ? 'success' : ($project->status == 'ongoing' ? 'primary' : 'secondary') }}">
                                                {{ ucfirst($project->status ?? 'Planning') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($project->demo_url || $project->github_url)
                        <div class="widget widget_download">
                            <h4 class="widget_title">Project Links</h4>
                            <div class="download-widget-wrap">
                                @if($project->demo_url)
                                    <a href="{{ $project->demo_url }}" target="_blank" class="th-btn">
                                        <i class="fa-solid fa-external-link-alt me-2"></i>LIVE DEMO
                                    </a>
                                @endif
                                @if($project->github_url)
                                    <a href="{{ $project->github_url }}" target="_blank" class="th-btn style5">
                                        <i class="fab fa-github me-2"></i>VIEW CODE
                                    </a>
                                @endif
                            </div>
                        </div>
                        @endif

                        <div class="widget widget_banner"
                            data-bg-src="{{ asset('assets_frontend/assets/img/bg/widget_banner.jpg') }}">
                            <div class="widget-banner">
                                <span class="text">CONTACT US NOW</span>
                                <h2 class="title">Need Similar Project?</h2>
                                <a href="{{ url('/contact') }}" class="th-btn style3">GET A QUOTE<i
                                        class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
