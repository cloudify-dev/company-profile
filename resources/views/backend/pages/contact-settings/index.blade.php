@extends('backend')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header border-0 bg-white">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-1 text-dark fw-semibold">Contact Settings</h5>
                    <p class="text-muted mb-0 small">Manage contact settings</p>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.contact-settings.create') }}" 
                       class="btn btn-primary btn-sm d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3 shadow-sm">
                        <i class="fas fa-plus"></i>
                        <span>Add Setting</span>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Search and Filter -->
        <div class="card-header py-0 border-0">
            <form method="GET" class="row align-items-center g-3">
                <div class="col-md-5">
                    <div class="input-group input-group-outline">
                        <input type="text" 
                               class="form-control" 
                               name="search" 
                               value="{{ request('search') }}"
                               placeholder="Search Setting..."
                               onchange="this.form.submit()">
                    </div>
                </div>
                <div class="col-md-7 text-md-end">
                    <div class="d-flex gap-2 justify-content-md-end flex-wrap">
                        <a href="{{ route('admin.contact-settings.index') }}" 
                           class="btn btn-sm {{ request('status', 'all') === 'all' ? 'bg-gradient-primary' : 'btn-outline-primary' }} px-3">
                            All
                        </a>
                        <a href="{{ route('admin.contact-settings.index', array_merge(request()->all(), ['status' => 'active'])) }}" 
                           class="btn btn-sm {{ request('status') === 'active' ? 'bg-gradient-success' : 'btn-outline-success' }} px-3">
                            Active
                        </a>
                        <a href="{{ route('admin.contact-settings.index', array_merge(request()->all(), ['status' => 'inactive'])) }}" 
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
                <table class="table table-hover align-middle mb-0" id="contactSettingTable">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="50">Title</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact Action</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="120">Status</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="100">Created</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="120">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contactSettings as $setting)
                            <tr class="border-bottom">
                                <td>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-sm font-weight-semibold">{{ Str::limit($setting->title, 60) }}</h6>
                                        <p class="text-xs text-muted mb-0">{{ Str::limit($setting->subtitle, 100) }}</p>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-primary">{{ ucfirst($setting->contact_action_type) }}</span>
                                    <br>
                                    <small class="text-muted">{{ $setting->contact_action_value }}</small>
                                </td>
                                <td class="text-center">
                                    @if($setting->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="text-dark small fw-semibold">
                                        {{ $setting->created_at->format('M d, Y') }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="{{ route('admin.contact-settings.edit', $setting) }}" 
                                           class="btn btn-link text-dark p-2 mb-0" 
                                           title="Edit Contact Setting">
                                            <i class="fas fa-edit text-secondary"></i>
                                        </a>
                                        <form action="{{ route('admin.contact-settings.destroy', $setting) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete this setting?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-link text-danger p-2 mb-0" 
                                                    title="Delete Contact Setting">
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
                                             style="width: 64px; height: 64px;">
                                            <i class="fas fa-question text-muted fa-2x"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">No Contact Setting Found</h6>
                                            <p class="text-muted mb-0 small">
                                                @if(request('search') || request('category') || request('status'))
                                                    No Contact Setting match your search criteria.
                                                @else
                                                    Start by adding your first Contact Setting.
                                                @endif
                                            </p>
                                            @if(!request('search') && !request('category') && !request('status'))
                                                <a href="{{ route('admin.contact-settings.create') }}" class="btn btn-primary btn-sm mt-2">
                                                    <i class="fas fa-plus me-1"></i> Add Contact Setting
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

            <!-- Pagination -->
            @if($contactSettings->hasPages() || $contactSettings->total() > 0)
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center py-3 px-4 gap-3">
                    <!-- Results Info -->
                    <div class="text-muted small">
                        Showing {{ $contactSettings->firstItem() ?? 0 }} to {{ $contactSettings->lastItem() ?? 0 }} 
                        of {{ $contactSettings->total() }} results
                        @if(request('search') || request('category') || request('status'))
                            @if(request('search'))
                                for "<strong>{{ request('search') }}</strong>"
                            @endif
                            @if(request('category'))
                                ({{ request('category') }} category)
                            @endif
                            @if(request('status'))
                                ({{ request('status') }} only)
                            @endif
                        @endif
                    </div>

                    <!-- Pagination Links -->
                    @if($contactSettings->hasPages())
                        <nav aria-label="Contact Setting pagination">
                            {{ $contactSettings->links() }}
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
