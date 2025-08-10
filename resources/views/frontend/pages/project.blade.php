@extends('frontend2')

@section('content')
    @include('frontend.partials.breadcrumb', [
        'title' => 'Our Projects',
        'bgImage' => !empty($pageSettings?->breadcrumb_image)
            ? 'storage/' . $pageSettings->breadcrumb_image
            : 'assets_frontend/assets/img/bg/breadcumb-bg.jpg',
        'breadcrumb' => [['label' => 'Our Projects']],
    ])

    <!--==============================
    Project Area  
    ==============================-->
    <section class="space">
        <div class="container">
            <div class="row gy-4">
                @forelse ($projects as $project)
                <div class="col-lg-4 col-md-6">
                    <div class="project-card">
                        <div class="project-img">
                            @if($project->image && file_exists(public_path('storage/' . $project->image)))
                                <img src="{{ asset('storage/' . $project->image) }}" 
                                     alt="{{ $project->title }}"
                                     style="width: 100%; height: 420px; object-fit: cover;">
                            @else
                                <div class="d-flex flex-column align-items-center justify-content-center text-white" 
                                     style="width: 100%; height: 420px; background: linear-gradient(135deg, var(--theme-color, #667eea) 0%, var(--theme-color, #764ba2) 60%, #2d3748 100%);">
                                    <div class="bg-white bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center mb-3 border border-white border-opacity-30"
                                         style="width: 60px; height: 60px;">
                                        <i class="fas fa-folder-open fa-lg text-secondary"></i>
                                    </div>
                                    <h6 class="text-white fw-semibold mb-1 text-center px-3">{{ $project->title }}</h6>
                                    <span class="text-white-50 small text-center">{{ $project->category }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="project-content-wrap">
                            <div class="project-content">
                                <div class="box-particle" id="project-p{{ $loop->iteration }}"></div>
                                <h3 class="box-title">
                                    <a href="{{ route('project.details', $project->id) }}">{{ $project->title }}</a>
                                </h3>
                                <p class="project-subtitle">{{ $project->category }}</p>
                                @if($project->image && file_exists(public_path('storage/' . $project->image)))
                                    <a href="{{ asset('storage/' . $project->image) }}" class="icon-btn popup-image">
                                        <i class="far fa-plus"></i>
                                    </a>
                                @else
                                    <a href="{{ route('project.details', $project->id) }}" class="icon-btn">
                                        <i class="far fa-plus"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="d-flex flex-column align-items-center justify-content-center text-muted" 
                            style="width: 100%; height: 300px;">
                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center mb-3"
                                style="width: 60px; height: 60px;">
                            <i class="fas fa-folder-open fa-lg"></i>
                        </div>
                        <h6 class="text-muted fw-semibold mb-1 text-center">No Projects</h6>
                        <span class="text-muted small text-center">Coming Soon</span>
                    </div>
                </div>
                @endforelse

            </div>
        </div>
        <div class="shape-mockup" data-top="0%" data-right="0%">
            <img src="{{ asset('assets_frontend/assets/img/shape/tech_shape_1.png') }}" alt="shape">
        </div>
        <div class="shape-mockup" data-bottom="0%" data-left="0%">
            <img src="{{ asset('assets_frontend/assets/img/shape/tech_shape_2.png') }}" alt="shape">
        </div>
    </section>

@endsection
