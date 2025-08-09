@extends('frontend2')

@section('content')
    @include('frontend.partials.breadcrumb', [
        'title' => 'Our Projects',
        'bgImage' => !empty($pageSettings?->breadcrumb_image)
            ? 'storage/' . $pageSettings->breadcrumb_image
            : 'assets_frontend/assets/img/bg/breadcumb-bg.jpg',
        'breadcrumb' => [['label' => 'All Projects']],
    ])

    <section class="space">
        <div class="container">
            <!-- Filter Section -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="bg-light p-4 rounded shadow-sm">
                        <form method="GET" action="{{ route('project') }}" class="row g-3">
                            <div class="col-md-8">
                                <select name="category" class="form-select">
                                    <option value="">All Categories</option>
                                    <option value="Web Development" {{ request('category') == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                                    <option value="Mobile App" {{ request('category') == 'Mobile App' ? 'selected' : '' }}>Mobile App</option>
                                    <option value="E-commerce" {{ request('category') == 'E-commerce' ? 'selected' : '' }}>E-commerce</option>
                                    <option value="Enterprise Software" {{ request('category') == 'Enterprise Software' ? 'selected' : '' }}>Enterprise Software</option>
                                    <option value="Fintech" {{ request('category') == 'Fintech' ? 'selected' : '' }}>Fintech</option>
                                    <option value="Healthcare" {{ request('category') == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                                    <option value="Education" {{ request('category') == 'Education' ? 'selected' : '' }}>Education</option>
                                    <option value="IoT" {{ request('category') == 'IoT' ? 'selected' : '' }}>IoT</option>
                                    <option value="Other" {{ request('category') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                            <!-- <div class="col-md-4">
                                <select name="status" class="form-select">
                                    <option value="">All Status</option>
                                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="ongoing" {{ request('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                    <option value="planning" {{ request('status') == 'planning' ? 'selected' : '' }}>Planning</option>
                                </select>
                            </div> -->
                            <div class="col-md-4">
                                <button type="submit" class="th-btn w-100">Filter Projects</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Featured Projects -->
            @if($featuredProjects->count() > 0)
            <div class="row">
                <div class="col-12">
                    <div class="title-area text-center">
                        <span class="sub-title">Featured</span>
                        <h2 class="sec-title">Our Best Projects</h2>
                        <p class="text-center">Check out our most successful and impactful projects.</p>
                    </div>
                </div>
            </div>
            <div class="row gy-4" style="margin-bottom: 5rem;">
                @foreach ($featuredProjects as $project)
                    <div class="col-lg-6 col-md-6">
                        <div class="project-card border border-warning rounded overflow-visible shadow">
                            <div class="project-img position-relative" style="height: 250px;">
                                @if($project->image && file_exists(public_path('storage/' . $project->image)))
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" 
                                         class="w-100 h-100" style="object-fit: cover;">
                                @else
                                    <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center">
                                        <div class="text-center text-muted">
                                            <i class="fas fa-image fa-3x mb-2"></i>
                                            <p class="mb-0">No Image</p>
                                        </div>
                                    </div>
                                @endif
                                <div class="position-absolute top-0 end-0 m-3" style="z-index: 10;">
                                    <span class="text-warning h4">
                                        <i class="fas fa-star me-2"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="project-content-wrap">
                                <div class="project-content p-4">
                                    <div class="mb-3">
                                        <span class="badge bg-white text-primary text-uppercase">{{ $project->category }}</span>
                                        @if($project->completion_date)
                                            <small class="text-white">
                                                <i class="fas fa-calendar mx-2"></i>{{ \Carbon\Carbon::parse($project->completion_date)->format('M Y') }}
                                            </small>
                                        @endif
                                    </div>
                                    <h3 class="box-title h5">
                                        <a href="{{ route('project.details', $project->id) }}" class="text-decoration-none">{{ $project->title }}</a>
                                    </h3>
                                    <p class="text-white mb-3">{{ Str::limit($project->description, 120) }}</p>
                                    @if($project->technologies)
                                        <div class="d-flex flex-wrap gap-1 mb-3">
                                            @foreach(array_slice($project->technologies, true ?: [], 0, 3) as $tech)
                                                <span class="badge bg-light text-dark border">{{ $tech }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ route('project.details', $project->id) }}" class="th-btn style3">View Details</a>
                                        <div class="d-flex gap-2">
                                            @if($project->demo_url)
                                                <a href="{{ $project->demo_url }}" target="_blank" class="icon-btn" title="Live Demo">
                                                    <i class="fas fa-external-link-alt"></i>
                                                </a>
                                            @endif
                                            @if($project->image && file_exists(public_path('storage/' . $project->image)))
                                                <a href="{{ asset('storage/' . $project->image) }}" class="icon-btn popup-image">
                                                    <i class="far fa-plus"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif

            <!-- All Projects -->
            <div class="row">
                <div class="col-12">
                    <div class="title-area text-center">
                        <span class="sub-title">Portfolio</span>
                        <h2 class="sec-title">All Projects</h2>
                        <p class="text-center">Explore our complete portfolio of successful projects.</p>
                    </div>
                </div>
            </div>
            
            <div class="row gy-4">
                @forelse ($projects as $project)
                    <div class="col-lg-4 col-md-6">
                        <div class="project-card rounded overflow-visible shadow-sm">
                            <div class="project-img position-relative" style="height: 200px;">
                                @if($project->image && file_exists(public_path('storage/' . $project->image)))
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" 
                                         class="w-100 h-100" style="object-fit: cover;">
                                @else
                                    <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center">
                                        <div class="text-center text-muted">
                                            <i class="fas fa-image fa-2x mb-2"></i>
                                            <p class="mb-0 small">No Image</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="project-content-wrap">
                                <div class="project-content p-4">
                                    <div class="mb-2">
                                        <span class="badge bg-white text-primary text-uppercase">{{ $project->category }}</span>
                                        @if($project->completion_date)
                                            <small class="text-white">
                                                <i class="fas fa-calendar mx-2"></i>{{ \Carbon\Carbon::parse($project->completion_date)->format('M Y') }}
                                            </small>
                                        @endif
                                    </div>
                                    <h3 class="box-title h5">
                                        <a href="{{ route('project.details', $project->id) }}" class="text-decoration-none">{{ $project->title }}</a>
                                    </h3>
                                    <p class="text-white mb-3">{{ Str::limit($project->description, 100) }}</p>
                                    @if($project->technologies)
                                        <div class="d-flex flex-wrap gap-1 mb-3">
                                            @foreach(array_slice($project->technologies, true ?: [], 0, 3) as $tech)
                                                <span class="badge bg-light text-dark border">{{ $tech }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ route('project.details', $project->id) }}" class="th-btn style3">View Details</a>
                                        <div class="d-flex gap-2">
                                            @if($project->demo_url)
                                                <a href="{{ $project->demo_url }}" target="_blank" class="icon-btn" title="Live Demo">
                                                    <i class="fas fa-external-link-alt"></i>
                                                </a>
                                            @endif
                                            @if($project->image && file_exists(public_path('storage/' . $project->image)))
                                                <a href="{{ asset('storage/' . $project->image) }}" class="icon-btn popup-image">
                                                    <i class="far fa-plus"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <h4>No Projects Found</h4>
                            <p class="text-muted">We don't have any projects matching your criteria at the moment.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($projects->hasPages())
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            {{ $projects->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="shape-mockup" data-top="0%" data-right="0%">
            <img src="{{ asset('assets_frontend/assets/img/shape/tech_shape_1.png') }}" alt="shape">
        </div>
        <div class="shape-mockup" data-bottom="0%" data-left="0%">
            <img src="{{ asset('assets_frontend/assets/img/shape/tech_shape_2.png') }}" alt="shape">
        </div>
    </section>
@endsection
