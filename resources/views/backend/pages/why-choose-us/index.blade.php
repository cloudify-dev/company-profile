@extends('backend')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header border-0 bg-white">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-1 text-dark fw-semibold">Why Choose Us Management</h5>
                    <p class="text-muted mb-0 small">Manage Why Choose Us sections</p>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.why-choose-us.create') }}" 
                       class="btn btn-primary btn-sm d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3 shadow-sm">
                        <i class="fas fa-plus"></i>
                        <span>Add Section</span>
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
                               placeholder="Search sections..."
                               onchange="this.form.submit()">
                    </div>
                </div>
                <div class="col-md-5 text-md-end">
                    <div class="d-flex gap-2 justify-content-md-end flex-wrap">
                        <a href="{{ route('admin.why-choose-us.index') }}" 
                           class="btn btn-sm {{ request('status', 'all') === 'all' ? 'bg-gradient-primary' : 'btn-outline-primary' }} px-3">
                            All
                        </a>
                        <a href="{{ route('admin.why-choose-us.index', array_merge(request()->all(), ['status' => 'active'])) }}" 
                           class="btn btn-sm {{ request('status') === 'active' ? 'bg-gradient-success' : 'btn-outline-success' }} px-3">
                            Active
                        </a>
                        <a href="{{ route('admin.why-choose-us.index', array_merge(request()->all(), ['status' => 'inactive'])) }}" 
                           class="btn btn-sm {{ request('status') === 'inactive' ? 'bg-gradient-secondary' : 'btn-outline-secondary' }} px-3">
                            Inactive
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-body px-0">
            @if($whyChooseUs->count() > 0)
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                    Section Details
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Status
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Features
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($whyChooseUs as $section)
                                <tr>
                                    <td class="ps-3">
                                        <div class="d-flex px-2 py-1">
                                            @if($section->image)
                                                <div class="me-3">
                                                    <img src="{{ asset('storage/' . $section->image) }}" 
                                                         class="avatar avatar-md rounded-3" 
                                                         alt="Section Image">
                                                </div>
                                            @endif
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-dark text-sm font-weight-semibold">
                                                    {{ $section->title_black }} <span class="text-primary">{{ $section->title_blue }}</span>
                                                </h6>
                                                <p class="text-xs text-muted mb-1">{{ $section->subtitle }}</p>
                                                <p class="text-xs text-muted mb-0">
                                                    {{ Str::limit($section->description, 60) }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.why-choose-us.toggle', $section) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="btn btn-sm {{ $section->is_active ? 'btn-success' : 'btn-secondary' }} rounded-pill px-3">
                                                {{ $section->is_active ? 'Active' : 'Inactive' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.why-choose-us.features', $section) }}" 
                                           class="btn btn-sm btn-outline-info px-3">
                                            <i class="fas fa-list me-1"></i>
                                            Manage ({{ $section->features->count() }})
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-light dropdown-toggle" 
                                                    type="button" 
                                                    data-bs-toggle="dropdown" 
                                                    aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" 
                                                       href="{{ route('admin.why-choose-us.show', $section) }}">
                                                        <i class="fas fa-eye me-2"></i>View
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" 
                                                       href="{{ route('admin.why-choose-us.edit', $section) }}">
                                                        <i class="fas fa-edit me-2"></i>Edit
                                                    </a>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <form action="{{ route('admin.why-choose-us.destroy', $section) }}" 
                                                          method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="dropdown-item text-danger"
                                                                onclick="return confirm('Are you sure you want to delete this section?')">
                                                            <i class="fas fa-trash me-2"></i>Delete
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="card-footer py-3">
                    {{ $whyChooseUs->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-question-circle text-muted" style="font-size: 4rem;"></i>
                    </div>
                    <h5 class="text-muted">No sections found</h5>
                    <p class="text-muted">Create your first Why Choose Us section.</p>
                    <a href="{{ route('admin.why-choose-us.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add Section
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
