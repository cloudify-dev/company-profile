@extends('backend')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header border-0 bg-white">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-1 text-dark fw-semibold">Team Management</h5>
                    <p class="text-muted mb-0 small">Manage your team members</p>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.team.create') }}" 
                       class="btn btn-primary btn-sm d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3 shadow-sm">
                        <i class="fas fa-plus"></i>
                        <span>Add Team Member</span>
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
                               placeholder="Search team members..."
                               onchange="this.form.submit()">
                    </div>
                </div>
                <div class="col-md-5 text-md-end">
                    <div class="d-flex gap-2 justify-content-md-end flex-wrap">
                        <a href="{{ route('admin.team.index') }}" 
                           class="btn btn-sm {{ request('status', 'all') === 'all' ? 'bg-gradient-primary' : 'btn-outline-primary' }} px-3">
                            All
                        </a>
                        <a href="{{ route('admin.team.index', array_merge(request()->all(), ['status' => 'active'])) }}" 
                           class="btn btn-sm {{ request('status') === 'active' ? 'bg-gradient-success' : 'btn-outline-success' }} px-3">
                            Active
                        </a>
                        <a href="{{ route('admin.team.index', array_merge(request()->all(), ['status' => 'inactive'])) }}" 
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
                <table class="table table-hover align-middle mb-0" id="teamTable">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="80">Image</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name & Position</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="100">Status</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="120">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($teams as $team)
                            <tr class="border-bottom">
                                <td class="text-center align-middle position-relative">
                                    @if ($team->image)
                                        <img src="{{ asset('storage/' . $team->image) }}" 
                                             class="rounded-circle shadow-sm" 
                                             width="48" 
                                             height="48" 
                                             style="object-fit: cover;"
                                             alt="{{ $team->name }}">
                                    @else
                                        <div class="bg-secondary rounded-circle shadow-sm position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center" 
                                             style="width: 48px; height: 48px;">
                                            <i class="fas fa-user text-white"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <h6 class="mb-1 fw-semibold text-dark">{{ $team->name }}</h6>
                                        <p class="text-muted mb-0 small">{{ $team->position }}</p>
                                        @if($team->company)
                                            <p class="text-primary mb-0 small fw-medium">{{ $team->company }}</p>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column gap-1">
                                        @if($team->email)
                                            <div class="d-flex align-items-center gap-2 small text-muted">
                                                <i class="fas fa-envelope"></i>
                                                <span>{{ $team->email }}</span>
                                            </div>
                                        @endif
                                        @if($team->phone)
                                            <div class="d-flex align-items-center gap-2 small text-muted">
                                                <i class="fas fa-phone"></i>
                                                <span>{{ $team->phone }}</span>
                                            </div>
                                        @endif
                                        @if(!$team->email && !$team->phone)
                                            <span class="text-muted small">No contact info</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="text-center">
                                    @if($team->is_active)
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
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('admin.team.edit', $team->id) }}" 
                                           class="btn btn-link text-dark p-2 mb-0" 
                                           title="Edit">
                                            <i class="fas fa-edit text-secondary"></i>
                                        </a>
                                        <form action="{{ route('admin.team.destroy', $team->id) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete {{ $team->name }}?')">
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
                                <td colspan="5" class="text-center py-5">
                                    <div class="d-flex flex-column align-items-center gap-3">
                                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" 
                                             style="width: 80px; height: 80px;">
                                            <i class="fas fa-users fa-2x text-muted"></i>
                                        </div>
                                        <div>
                                            @if(request('search') || request('status'))
                                                <h6 class="text-muted mb-2">No matching team members found</h6>
                                                <p class="text-muted small mb-3">Try adjusting your search or filter criteria</p>
                                                <a href="{{ route('admin.team.index') }}" class="btn btn-outline-secondary btn-sm">
                                                    Clear Filters
                                                </a>
                                            @else
                                                <h6 class="text-muted mb-2">No team members found</h6>
                                                <p class="text-muted small mb-3">Start by adding your first team member</p>
                                                <a href="{{ route('admin.team.create') }}" 
                                                   class="btn btn-primary btn-sm d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3">
                                                    <i class="fas fa-plus"></i>
                                                    <span>Add First Team Member</span>
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
                @forelse ($teams as $team)
                    <div class="card shadow-sm mb-3 mx-3 team-card" data-status="{{ $team->is_active ? 'active' : 'inactive' }}">
                        <div class="card-body p-3">
                            <!-- Header with Image and Status -->
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="flex-shrink-0">
                                    @if ($team->image)
                                        <img src="{{ asset('storage/' . $team->image) }}" 
                                             class="rounded-circle shadow-sm" 
                                             width="48" 
                                             height="48" 
                                             style="object-fit: cover;"
                                             alt="{{ $team->name }}">
                                    @else
                                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center shadow-sm" 
                                             style="width: 48px; height: 48px;">
                                            <i class="fas fa-user text-white"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-grow-1 min-w-0">
                                    <h6 class="mb-1 fw-semibold text-dark">{{ $team->name }}</h6>
                                    <p class="text-muted mb-0 small">{{ $team->position }}</p>
                                    @if($team->company)
                                        <p class="text-primary mb-0 small fw-medium">{{ $team->company }}</p>
                                    @endif
                                </div>
                                <div class="flex-shrink-0">
                                    @if($team->is_active)
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

                            <!-- Contact Info -->
                            @if($team->email || $team->phone)
                                <div class="mb-3">
                                    @if($team->email)
                                        <div class="d-flex align-items-center gap-2 mb-1 small text-muted">
                                            <i class="fas fa-envelope flex-shrink-0"></i>
                                            <span class="text-break">{{ $team->email }}</span>
                                        </div>
                                    @endif
                                    @if($team->phone)
                                        <div class="d-flex align-items-center gap-2 small text-muted">
                                            <i class="fas fa-phone flex-shrink-0"></i>
                                            <span>{{ $team->phone }}</span>
                                        </div>
                                    @endif
                                </div>
                            @endif

                            <!-- Action Buttons -->
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('admin.team.edit', $team->id) }}" 
                                   class="btn btn-sm btn-primary d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3 mb-0">
                                    <i class="fas fa-edit"></i>
                                    <span>Edit</span>
                                </a>
                                <form action="{{ route('admin.team.destroy', $team->id) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Delete {{ $team->name }}?')">
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
                                <i class="fas fa-users fa-2x text-muted"></i>
                            </div>
                            <div>
                                @if(request('search') || request('status'))
                                    <h6 class="text-muted mb-2">No matching team members found</h6>
                                    <p class="text-muted small mb-3">Try adjusting your search or filter criteria</p>
                                    <a href="{{ route('admin.team.index') }}" class="btn btn-outline-secondary btn-sm">
                                        Clear Filters
                                    </a>
                                @else
                                    <h6 class="text-muted mb-2">No team members found</h6>
                                    <p class="text-muted small mb-3">Start by adding your first team member</p>
                                    <a href="{{ route('admin.team.create') }}" 
                                       class="btn btn-primary btn-sm d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3">
                                        <i class="fas fa-plus"></i>
                                        <span>Add First Team Member</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($teams->hasPages() || $teams->total() > 0)
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center py-3 px-4 gap-3">
                    <!-- Results Info -->
                    <div class="text-muted small">
                        Showing {{ $teams->firstItem() ?? 0 }} to {{ $teams->lastItem() ?? 0 }} 
                        of {{ $teams->total() }} results
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
                    @if(true)
                        <nav aria-label="Team pagination">
                            <ul class="pagination pagination-sm mb-0">
                                {{-- Previous Page Link --}}
                                @if ($teams->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link rounded-3 me-1">
                                            <i class="fas fa-chevron-left"></i>
                                        </span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link rounded-3 me-1" href="{{ $teams->previousPageUrl() }}">
                                            <i class="fas fa-chevron-left"></i>
                                        </a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($teams->getUrlRange(1, $teams->lastPage()) as $page => $url)
                                    @if ($page == $teams->currentPage())
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
                                @if ($teams->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link rounded-3 ms-1" href="{{ $teams->nextPageUrl() }}">
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
