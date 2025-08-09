@extends('backend')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header border-0 bg-white">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-1 text-dark fw-semibold">Project Management</h5>
                    <p class="text-muted mb-0 small">Manage your portfolio projects</p>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.project.create') }}" 
                       class="btn btn-primary btn-sm d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3 shadow-sm">
                        <i class="fas fa-plus"></i>
                        <span>Add New Project</span>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Search and Filter -->
        <div class="card-header py-0 border-0">
            <form method="GET" class="row align-items-center g-3">
                <div class="col-md-7">
                    <div class="input-group input-group-outline">
                        <input type="text" 
                               class="form-control" 
                               name="search" 
                               value="{{ request('search') }}"
                               placeholder="Search projects by title or category..."
                               onchange="this.form.submit()">
                    </div>
                </div>
                <div class="col-md-5 text-md-end">
                    <div class="d-flex gap-2 justify-content-md-end flex-wrap">
                        <a href="{{ route('admin.project.index') }}" 
                           class="btn btn-sm {{ request('status', 'all') === 'all' ? 'bg-gradient-primary' : 'btn-outline-primary' }} px-3">
                            All
                        </a>
                        <a href="{{ route('admin.project.index', array_merge(request()->all(), ['status' => 'active'])) }}" 
                           class="btn btn-sm {{ request('status') === 'active' ? 'bg-gradient-success' : 'btn-outline-success' }} px-3">
                            Active
                        </a>
                        <a href="{{ route('admin.project.index', array_merge(request()->all(), ['status' => 'inactive'])) }}" 
                           class="btn btn-sm {{ request('status') === 'inactive' ? 'bg-gradient-secondary' : 'btn-outline-secondary' }} px-3">
                            Inactive
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-body p-0">
            <!-- Desktop Table -->
            <div class="table-responsive d-none d-lg-block mx-4">
                <table class="table table-hover align-middle mb-0" id="projectTable">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="80">Image</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Project Info</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="100">Status</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="120">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $project)
                            <tr class="border-bottom">
                                <td class="text-center align-middle position-relative">
                                    @if ($project->image)
                                        <img src="{{ asset('storage/' . $project->image) }}" 
                                             class="rounded shadow-sm" 
                                             width="48" 
                                             height="48" 
                                             style="object-fit: cover;"
                                             alt="{{ $project->title }}">
                                    @else
                                        <div class="bg-secondary rounded shadow-sm position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center" 
                                             style="width: 48px; height: 48px;">
                                            <i class="fas fa-image text-white"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <h6 class="mb-1 fw-semibold text-dark">{{ $project->title }}</h6>
                                        <p class="text-muted mb-0 small">
                                            <i class="fas fa-calendar me-1"></i>
                                            {{ $project->created_at->format('M d, Y') }}
                                        </p>
                                    </div>
                                </td>
                                <td class="text-center align-middle">
                                    <span class="badge 
                                        @if($project->category === 'web') bg-info 
                                        @elseif($project->category === 'mobile') bg-success 
                                        @elseif($project->category === 'desktop') bg-warning 
                                        @else bg-secondary @endif 
                                        text-white px-2 py-1 rounded-pill">
                                        {{ ucfirst($project->category) }}
                                    </span>
                                </td>
                                <td>
                                    <p class="text-muted mb-0 small">
                                        {{ Str::limit($project->description, 95) }}
                                    </p>
                                </td>
                                <td class="text-center align-middle">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        @if($project->is_active)
                                            <span class="badge bg-success text-white px-2 py-1 rounded-pill">
                                                Active
                                            </span>
                                        @else
                                            <span class="badge bg-secondary text-white px-2 py-1 rounded-pill">
                                                Inactive
                                            </span>
                                        @endif

                                        <!-- @if($project->is_featured ?? false)
                                            <span class="badge bg-warning text-white px-2 py-1 rounded-pill mt-2">
                                                <i class="fas fa-star me-1 text-white"></i>Featured
                                            </span>
                                        @endif -->
                                    </div>
                                </td>
                                <td class="text-center align-middle">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('admin.project.edit', $project->id) }}" 
                                           class="btn btn-link text-dark p-2 mb-0" 
                                           title="Edit">
                                            <i class="fas fa-edit text-secondary"></i>
                                        </a>
                                        <form action="{{ route('admin.project.destroy', $project->id) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete {{ $project->title }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-link text-danger p-2 mb-0" 
                                                    title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="d-flex flex-column align-items-center gap-3">
                                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" 
                                             style="width: 80px; height: 80px;">
                                            <i class="fas fa-project-diagram fa-2x text-muted"></i>
                                        </div>
                                        <div>
                                            @if(request('search') || request('category'))
                                                <h6 class="text-muted mb-2">No matching projects found</h6>
                                                <p class="text-muted small mb-3">Try adjusting your search or filter criteria</p>
                                                <a href="{{ route('admin.project.index') }}" class="btn btn-outline-secondary btn-sm">
                                                    Clear Filters
                                                </a>
                                            @else
                                                <h6 class="text-muted mb-2">No projects found</h6>
                                                <p class="text-muted small mb-3">Start by adding your first project</p>
                                                <a href="{{ route('admin.project.create') }}" 
                                                   class="btn btn-primary btn-sm d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3">
                                                    <i class="fas fa-plus"></i>
                                                    <span>Add First Project</span>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Mobile Cards -->
            <div class="d-lg-none mt-3" id="mobileCards">
                @forelse ($projects as $project)
                    <div class="card shadow-sm mb-3 mx-3 project-card">
                        <div class="card-body p-3">
                            <!-- Header with Image and Category -->
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="flex-shrink-0">
                                    @if ($project->image)
                                        <img src="{{ asset('storage/' . $project->image) }}" 
                                             class="rounded shadow-sm" 
                                             width="48" 
                                             height="48" 
                                             style="object-fit: cover;"
                                             alt="{{ $project->title }}">
                                    @else
                                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center shadow-sm" 
                                             style="width: 48px; height: 48px;">
                                            <i class="fas fa-image text-white"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-grow-1 min-w-0">
                                    <h6 class="mb-1 fw-semibold text-dark">{{ $project->title }}</h6>
                                    <p class="text-muted mb-0 small">
                                        <i class="fas fa-calendar me-1"></i>
                                        {{ $project->created_at->format('M d, Y') }}
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="badge 
                                        @if($project->category === 'web') bg-info 
                                        @elseif($project->category === 'mobile') bg-success 
                                        @elseif($project->category === 'desktop') bg-warning 
                                        @else bg-secondary @endif 
                                        text-white px-2 py-1 rounded-pill small">
                                        {{ ucfirst($project->category) }}
                                    </span>
                                </div>
                            </div>

                            <!-- Description -->
                            @if($project->description)
                                <div class="mb-3">
                                    <p class="text-muted small mb-0">{{ Str::limit($project->description, 100) }}</p>
                                </div>
                            @endif

                            <!-- Status and Actions -->
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    @if($project->is_featured ?? false)
                                        <span class="badge bg-warning text-white px-2 py-1 rounded-pill small">
                                            <i class="fas fa-star me-1 text-white"></i>Featured
                                        </span>
                                    @endif
                                </div>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.project.edit', $project->id) }}" 
                                       class="btn btn-sm btn-primary d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3 mb-0">
                                        <i class="fas fa-edit"></i>
                                        <span>Edit</span>
                                    </a>
                                    <form action="{{ route('admin.project.destroy', $project->id) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Delete {{ $project->title }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3 mb-0">
                                            <i class="fas fa-trash"></i>
                                            <span>Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5 px-3">
                        <div class="d-flex flex-column align-items-center gap-3">
                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 80px; height: 80px;">
                                <i class="fas fa-project-diagram fa-2x text-muted"></i>
                            </div>
                            <div>
                                @if(request('search') || request('category'))
                                    <h6 class="text-muted mb-2">No matching projects found</h6>
                                    <p class="text-muted small mb-3">Try adjusting your search or filter criteria</p>
                                    <a href="{{ route('admin.project.index') }}" class="btn btn-outline-secondary btn-sm">
                                        Clear Filters
                                    </a>
                                @else
                                    <h6 class="text-muted mb-2">No projects found</h6>
                                    <p class="text-muted small mb-3">Start by adding your first project</p>
                                    <a href="{{ route('admin.project.create') }}" 
                                       class="btn btn-primary btn-sm d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3">
                                        <i class="fas fa-plus"></i>
                                        <span>Add First Project</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($projects->hasPages() || $projects->total() > 0)
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center py-3 px-4 gap-3">
                    <!-- Results Info -->
                    <div class="text-muted small">
                        Showing {{ $projects->firstItem() ?? 0 }} to {{ $projects->lastItem() ?? 0 }} 
                        of {{ $projects->total() }} results
                        @if(request('search') || request('category'))
                            @if(request('search'))
                                for "<strong>{{ request('search') }}</strong>"
                            @endif
                            @if(request('category'))
                                ({{ request('category') }} category)
                            @endif
                        @endif
                    </div>

                    <!-- Pagination Links -->
                    @if(true)
                        <nav aria-label="Project pagination">
                            <ul class="pagination pagination-sm mb-0">
                                {{-- Previous Page Link --}}
                                @if ($projects->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link rounded-3 me-1">
                                            <i class="fas fa-chevron-left"></i>
                                        </span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link rounded-3 me-1" href="{{ $projects->previousPageUrl() }}">
                                            <i class="fas fa-chevron-left"></i>
                                        </a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($projects->getUrlRange(1, $projects->lastPage()) as $page => $url)
                                    @if ($page == $projects->currentPage())
                                        <li class="page-item active">
                                            <span class="page-link bg-primary border-primary rounded-3 mx-1 text-white">{{ $page }}</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link rounded-3 mx-1" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($projects->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link rounded-3 ms-1" href="{{ $projects->nextPageUrl() }}">
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link rounded-3 ms-1">
                                            <i class="fas fa-chevron-right"></i>
                                        </span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    @endif
                </div>
            @endif
        </div>
    </div>

    <!-- Success Toast -->
    @if(session('success'))
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050;">
            <div class="toast show" role="alert">
                <div class="toast-header bg-success text-white border-0">
                    <i class="fas fa-check-circle me-2"></i>
                    <strong class="me-auto">Success</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif
@endsection
