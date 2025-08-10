@extends('backend')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header border-0 bg-white">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-1 text-dark fw-semibold">
                        {{ $contactSection->title_black }} {{ $contactSection->title_blue }} - Features
                    </h5>
                    <p class="text-muted mb-0 small">Manage contact features for this section</p>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.contact-section.index') }}" 
                       class="btn btn-outline-secondary btn-sm me-2">
                        <i class="fas fa-arrow-left"></i>
                        Back to Sections
                    </a>
                    <a href="{{ route('admin.contact-section.features.create', $contactSection) }}" 
                       class="btn btn-primary btn-sm d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3 shadow-sm">
                        <i class="fas fa-plus"></i>
                        <span>Add Feature</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body px-0">
            @if($features->count() > 0)
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                    Contact Feature
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Icon
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Link
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Sort
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Status
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($features as $feature)
                                <tr>
                                    <td class="ps-3">
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-dark text-sm font-weight-semibold">
                                                    {{ $feature->label }}
                                                </h6>
                                                <p class="text-xs text-muted mb-0">
                                                    {{ $feature->value }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @if($feature->icon)
                                            <i class="{{ $feature->icon }} text-primary"></i>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($feature->link)
                                            <span class="badge bg-success">Yes</span>
                                        @else
                                            <span class="badge bg-secondary">No</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <span class="text-xs font-weight-bold">{{ $feature->sort_order }}</span>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.contact-section.features.toggle', [$contactSection, $feature]) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="btn btn-sm {{ $feature->is_active ? 'btn-success' : 'btn-secondary' }} rounded-pill px-3">
                                                {{ $feature->is_active ? 'Active' : 'Inactive' }}
                                            </button>
                                        </form>
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
                                                       href="{{ route('admin.contact-section.features.edit', [$contactSection, $feature]) }}">
                                                        <i class="fas fa-edit me-2"></i>Edit
                                                    </a>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <form action="{{ route('admin.contact-section.features.destroy', [$contactSection, $feature]) }}" 
                                                          method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="dropdown-item text-danger"
                                                                onclick="return confirm('Are you sure you want to delete this feature?')">
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
            @else
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-phone text-muted" style="font-size: 4rem;"></i>
                    </div>
                    <h5 class="text-muted">No contact features found</h5>
                    <p class="text-muted">Create your first contact feature for this section.</p>
                    <a href="{{ route('admin.contact-section.features.create', $contactSection) }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add Contact Feature
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
