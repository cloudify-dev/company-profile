@extends('backend')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header border-0 bg-white">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-1 text-dark fw-semibold">Contact Section Management</h5>
                    <p class="text-muted mb-0 small">Manage contact sections</p>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.contact-section.create') }}" 
                       class="btn btn-primary btn-sm d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3 shadow-sm">
                        <i class="fas fa-plus"></i>
                        <span>Add Section</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body px-0">
            @if($contactSections->count() > 0)
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
                            @foreach($contactSections as $section)
                                <tr>
                                    <td class="ps-3">
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-dark text-sm font-weight-semibold">
                                                    {{ $section->form_title }}
                                                </h6>
                                                <p class="text-xs text-muted mb-0">
                                                    @if($section->background_image)
                                                        <i class="fas fa-image me-1"></i>Background Image Set
                                                    @else
                                                        <i class="fas fa-image me-1 text-muted"></i>No Background Image
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.contact-section.toggle', $section) }}" 
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
                                        <a href="{{ route('admin.contact-section.features', $section) }}" 
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
                                                       href="{{ route('admin.contact-section.edit', $section) }}">
                                                        <i class="fas fa-edit me-2"></i>Edit
                                                    </a>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <form action="{{ route('admin.contact-section.destroy', $section) }}" 
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
                    {{ $contactSections->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-envelope text-muted" style="font-size: 4rem;"></i>
                    </div>
                    <h5 class="text-muted">No sections found</h5>
                    <p class="text-muted">Create your first contact section.</p>
                    <a href="{{ route('admin.contact-section.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add Section
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
