@extends('backend')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header border-0 bg-white">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-1 text-dark fw-semibold">Testimonials Management</h5>
                    <p class="text-muted mb-0 small">Manage customer testimonials and reviews</p>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.testimonial.create') }}" 
                       class="btn btn-primary btn-sm d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3 shadow-sm">
                        <i class="fas fa-plus"></i>
                        <span>Add Testimonial</span>
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
                               placeholder="Search testimonials..."
                               onchange="this.form.submit()">
                    </div>
                </div>
                <div class="col-md-5 text-md-end">
                    <div class="d-flex gap-2 justify-content-md-end flex-wrap">
                        <a href="{{ route('admin.testimonial.index') }}" 
                           class="btn btn-sm {{ request('status', 'all') === 'all' ? 'bg-gradient-primary' : 'btn-outline-primary' }} px-3">
                            All
                        </a>
                        <a href="{{ route('admin.testimonial.index', array_merge(request()->all(), ['status' => 'active'])) }}" 
                           class="btn btn-sm {{ request('status') === 'active' ? 'bg-gradient-success' : 'btn-outline-success' }} px-3">
                            Active
                        </a>
                        <a href="{{ route('admin.testimonial.index', array_merge(request()->all(), ['status' => 'inactive'])) }}" 
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
                <table class="table table-hover align-middle mb-0" id="testimonialsTable">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="80">Image</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name & Position</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rating</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="100">Status</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="100">Sort Order</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="120">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($testimonials as $testimonial)
                            <tr class="border-bottom">
                                <td class="text-center align-middle position-relative">
                                    @if ($testimonial->image)
                                        <img src="{{ asset('storage/' . $testimonial->image) }}" 
                                             class="rounded-circle shadow-sm" 
                                             width="48" 
                                             height="48" 
                                             style="object-fit: cover;"
                                             alt="{{ $testimonial->name }}">
                                    @else
                                        <div class="bg-secondary rounded-circle shadow-sm position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center" 
                                             style="width: 48px; height: 48px;">
                                            <span class="text-white small fw-bold">{{ substr($testimonial->name, 0, 2) }}</span>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <h6 class="mb-1 fw-semibold text-dark">{{ $testimonial->name }}</h6>
                                        <p class="text-muted mb-0 small">{{ $testimonial->position }}</p>
                                        @if($testimonial->company)
                                            <p class="text-primary mb-0 small fw-medium">{{ $testimonial->company }}</p>
                                        @endif
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        @for($i = 0; $i < $testimonial->rating; $i++)
                                            <i class="fas fa-star text-warning"></i>
                                        @endfor
                                        @for($i = $testimonial->rating; $i < 5; $i++)
                                            <i class="fas fa-star text-muted"></i>
                                        @endfor
                                    </div>
                                    <small class="text-muted">{{ $testimonial->rating }}/5</small>
                                </td>
                                <td class="text-center">
                                    @if($testimonial->is_active)
                                        <span class="badge bg-success text-white px-2 py-1 rounded-pill">
                                            Active
                                        </span>
                                    @else
                                        <span class="badge bg-secondary text-white px-2 py-1 rounded-pill">
                                            Inactive
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-light text-dark px-2 py-1 rounded-pill">
                                        {{ $testimonial->sort_order }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('admin.testimonial.edit', $testimonial) }}" 
                                           class="btn btn-link text-dark p-2 mb-0" 
                                           title="Edit">
                                            <i class="fas fa-edit text-secondary"></i>
                                        </a>
                                        <form action="{{ route('admin.testimonial.destroy', $testimonial) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete {{ $testimonial->name }}\'s testimonial?')">
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
                                            <i class="fas fa-comments fa-2x text-muted"></i>
                                        </div>
                                        <div>
                                            @if(request('search') || request('status'))
                                                <h6 class="text-muted mb-2">No matching testimonials found</h6>
                                                <p class="text-muted small mb-3">Try adjusting your search or filter criteria</p>
                                                <a href="{{ route('admin.testimonial.index') }}" class="btn btn-outline-secondary btn-sm">
                                                    Clear Filters
                                                </a>
                                            @else
                                                <h6 class="text-muted mb-2">No testimonials found</h6>
                                                <p class="text-muted small mb-3">Start by adding your first testimonial</p>
                                                <a href="{{ route('admin.testimonial.create') }}" 
                                                   class="btn btn-primary btn-sm d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3">
                                                    <i class="fas fa-plus"></i>
                                                    <span>Add First Testimonial</span>
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
            <div class="d-lg-none" id="mobileCards">
                @forelse($testimonials as $testimonial)
                    <div class="card shadow-sm mb-3 mx-3 testimonial-card" data-status="{{ $testimonial->is_active ? 'active' : 'inactive' }}">
                        <div class="card-body p-3">
                            <!-- Header with Image and Status -->
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="flex-shrink-0">
                                    @if ($testimonial->image)
                                        <img src="{{ asset('storage/' . $testimonial->image) }}" 
                                             class="rounded-circle shadow-sm" 
                                             width="48" 
                                             height="48" 
                                             style="object-fit: cover;"
                                             alt="{{ $testimonial->name }}">
                                    @else
                                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center shadow-sm" 
                                             style="width: 48px; height: 48px;">
                                            <span class="text-white small fw-bold">{{ substr($testimonial->name, 0, 2) }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-grow-1 min-w-0">
                                    <h6 class="mb-1 fw-semibold text-dark">{{ $testimonial->name }}</h6>
                                    <p class="text-muted mb-0 small">{{ $testimonial->position }}</p>
                                    @if($testimonial->company)
                                        <p class="text-primary mb-0 small fw-medium">{{ $testimonial->company }}</p>
                                    @endif
                                </div>
                                <div class="flex-shrink-0">
                                    @if($testimonial->is_active)
                                        <span class="badge bg-success text-white px-2 py-1 rounded-pill small">
                                            Active
                                        </span>
                                    @else
                                        <span class="badge bg-secondary text-white px-2 py-1 rounded-pill small">
                                            Inactive
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Rating and Sort Order -->
                            <div class="mb-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="d-flex gap-1 mb-1">
                                            @for($i = 0; $i < $testimonial->rating; $i++)
                                                <i class="fas fa-star text-warning small"></i>
                                            @endfor
                                            @for($i = $testimonial->rating; $i < 5; $i++)
                                                <i class="fas fa-star text-muted small"></i>
                                            @endfor
                                        </div>
                                        <small class="text-muted">Rating: {{ $testimonial->rating }}/5</small>
                                    </div>
                                    <div class="text-end">
                                        <small class="text-muted">Sort Order</small><br>
                                        <span class="badge bg-light text-dark px-2 py-1 rounded-pill">{{ $testimonial->sort_order }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('admin.testimonial.edit', $testimonial) }}" 
                                   class="btn btn-sm btn-primary d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3 mb-0">
                                    <i class="fas fa-edit"></i>
                                    <span>Edit</span>
                                </a>
                                <form action="{{ route('admin.testimonial.destroy', $testimonial) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Delete {{ $testimonial->name }}\'s testimonial?')">
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
                @empty
                    <div class="text-center py-5 px-3">
                        <div class="d-flex flex-column align-items-center gap-3">
                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 80px; height: 80px;">
                                <i class="fas fa-comments fa-2x text-muted"></i>
                            </div>
                            <div>
                                @if(request('search') || request('status'))
                                    <h6 class="text-muted mb-2">No matching testimonials found</h6>
                                    <p class="text-muted small mb-3">Try adjusting your search or filter criteria</p>
                                    <a href="{{ route('admin.testimonial.index') }}" class="btn btn-outline-secondary btn-sm">
                                        Clear Filters
                                    </a>
                                @else
                                    <h6 class="text-muted mb-2">No testimonials found</h6>
                                    <p class="text-muted small mb-3">Start by adding your first testimonial</p>
                                    <a href="{{ route('admin.testimonial.create') }}" 
                                       class="btn btn-primary btn-sm d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3">
                                        <i class="fas fa-plus"></i>
                                        <span>Add First Testimonial</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if(isset($testimonials) && ($testimonials->hasPages() || $testimonials->total() > 0))
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center py-3 px-4 gap-3">
                    <!-- Results Info -->
                    <div class="text-muted small">
                        Showing {{ $testimonials->firstItem() ?? 0 }} to {{ $testimonials->lastItem() ?? 0 }} 
                        of {{ $testimonials->total() }} results
                        @if(request('search') || request('status'))
                            @if(request('search'))
                                for "<strong>{{ request('search') }}</strong>"
                            @endif
                            @if(request('status'))
                                ({{ request('status') }} only)
                            @endif
                        @endif
                    </div>

                    <!-- Pagination Links -->
                    @if($testimonials->hasPages())
                        <nav aria-label="Testimonials pagination">
                            <ul class="pagination pagination-sm mb-0">
                                {{-- Previous Page Link --}}
                                @if ($testimonials->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link rounded-3 me-1">
                                            <i class="fas fa-chevron-left"></i>
                                        </span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link rounded-3 me-1" href="{{ $testimonials->previousPageUrl() }}">
                                            <i class="fas fa-chevron-left"></i>
                                        </a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($testimonials->getUrlRange(1, $testimonials->lastPage()) as $page => $url)
                                    @if ($page == $testimonials->currentPage())
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
                                @if ($testimonials->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link rounded-3 ms-1" href="{{ $testimonials->nextPageUrl() }}">
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
