@extends('backend')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header border-0 bg-white">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-1 text-dark fw-semibold">FAQ Management</h5>
                    <p class="text-muted mb-0 small">Manage frequently asked questions</p>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.faq.create') }}" 
                       class="btn btn-primary btn-sm d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3 shadow-sm">
                        <i class="fas fa-plus"></i>
                        <span>Add FAQ</span>
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
                               placeholder="Search FAQ..."
                               onchange="this.form.submit()">
                    </div>
                </div>
                <div class="col-md-3">
                    <select name="category" class="form-select" onchange="this.form.submit()">
                        <option value="">All Categories</option>
                        <option value="general" {{ request('category') === 'general' ? 'selected' : '' }}>General</option>
                        <option value="services" {{ request('category') === 'services' ? 'selected' : '' }}>Services</option>
                        <option value="pricing" {{ request('category') === 'pricing' ? 'selected' : '' }}>Pricing</option>
                        <option value="technical" {{ request('category') === 'technical' ? 'selected' : '' }}>Technical</option>
                        <option value="support" {{ request('category') === 'support' ? 'selected' : '' }}>Support</option>
                    </select>
                </div>
                <div class="col-md-4 text-md-end">
                    <div class="d-flex gap-2 justify-content-md-end flex-wrap">
                        <a href="{{ route('admin.faq.index') }}" 
                           class="btn btn-sm {{ request('status', 'all') === 'all' ? 'bg-gradient-primary' : 'btn-outline-primary' }} px-3">
                            All
                        </a>
                        <a href="{{ route('admin.faq.index', array_merge(request()->all(), ['status' => 'active'])) }}" 
                           class="btn btn-sm {{ request('status') === 'active' ? 'bg-gradient-success' : 'btn-outline-success' }} px-3">
                            Active
                        </a>
                        <a href="{{ route('admin.faq.index', array_merge(request()->all(), ['status' => 'inactive'])) }}" 
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
                <table class="table table-hover align-middle mb-0" id="faqTable">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="50">Order</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Question</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="120">Category</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="100">Status</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="120">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($faqs as $faq)
                            <tr class="border-bottom">
                                <td class="text-center align-middle">
                                    <span class="badge bg-light text-dark">{{ $faq->order }}</span>
                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-sm font-weight-semibold">{{ Str::limit($faq->question, 60) }}</h6>
                                        <p class="text-xs text-muted mb-0">{{ Str::limit($faq->answer, 100) }}</p>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <span class="badge {{ $faq->category_badge }}">{{ $faq->category_label }}</span>
                                </td>
                                <td class="text-center">
                                    @if($faq->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="{{ route('admin.faq.edit', $faq) }}" 
                                           class="btn btn-link text-dark p-2 mb-0" 
                                           title="Edit FAQ">
                                            <i class="fas fa-edit text-secondary"></i>
                                        </a>
                                        <form action="{{ route('admin.faq.destroy', $faq) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete this FAQ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-link text-danger p-2 mb-0" 
                                                    title="Delete FAQ">
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
                                            <h6 class="mb-1">No FAQ Found</h6>
                                            <p class="text-muted mb-0 small">
                                                @if(request('search') || request('category') || request('status'))
                                                    No FAQ match your search criteria.
                                                @else
                                                    Start by adding your first FAQ.
                                                @endif
                                            </p>
                                            @if(!request('search') && !request('category') && !request('status'))
                                                <a href="{{ route('admin.faq.create') }}" class="btn btn-primary btn-sm mt-2">
                                                    <i class="fas fa-plus me-1"></i> Add FAQ
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
                @forelse ($faqs as $faq)
                    <div class="card shadow-sm mb-3 mx-3 faq-card" data-status="{{ $faq->is_active ? 'active' : 'inactive' }}">
                        <div class="card-body p-3">
                            <!-- Header with Category and Status -->
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge {{ $faq->category_badge }}">{{ $faq->category_label }}</span>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-light text-dark">{{ $faq->order }}</span>
                                    @if($faq->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Question and Answer -->
                            <div class="mb-3">
                                <h6 class="mb-2 text-dark">{{ $faq->question }}</h6>
                                <p class="text-muted small mb-0">{{ Str::limit($faq->answer, 120) }}</p>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('admin.faq.edit', $faq) }}" 
                                   class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-edit me-1"></i> Edit
                                </a>
                                <form action="{{ route('admin.faq.destroy', $faq) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this FAQ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-trash me-1"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5 px-3">
                        <div class="d-flex flex-column align-items-center gap-3">
                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 64px; height: 64px;">
                                <i class="fas fa-question text-muted fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">No FAQ Found</h6>
                                <p class="text-muted mb-0 small">
                                    @if(request('search') || request('category') || request('status'))
                                        No FAQ match your search criteria.
                                    @else
                                        Start by adding your first FAQ.
                                    @endif
                                </p>
                                @if(!request('search') && !request('category') && !request('status'))
                                    <a href="{{ route('admin.faq.create') }}" class="btn btn-primary btn-sm mt-2">
                                        <i class="fas fa-plus me-1"></i> Add FAQ
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($faqs->hasPages() || $faqs->total() > 0)
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center py-3 px-4 gap-3">
                    <!-- Results Info -->
                    <div class="text-muted small">
                        Showing {{ $faqs->firstItem() ?? 0 }} to {{ $faqs->lastItem() ?? 0 }} 
                        of {{ $faqs->total() }} results
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
                    @if($faqs->hasPages())
                        <nav aria-label="FAQ pagination">
                            {{ $faqs->links() }}
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