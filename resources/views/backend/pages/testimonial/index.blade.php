@extends('backend')

@section('title', 'Testimonials')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Testimonials</h6>
                        <a href="{{ route('admin.testimonial.create') }}" class="btn bg-gradient-primary btn-sm">
                            <i class="fas fa-plus me-1"></i> Add New Testimonial
                        </a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    @if(session('success'))
                        <div class="alert alert-success mx-3" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Position</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Company</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rating</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sort Order</th>
                                    <th class="text-secondary opacity-7">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($testimonials as $testimonial)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    @if($testimonial->image)
                                                        <img src="{{ asset('storage/' . $testimonial->image) }}" 
                                                             class="avatar avatar-sm me-3" alt="{{ $testimonial->name }}">
                                                    @else
                                                        <div class="avatar avatar-sm me-3 bg-gradient-secondary">
                                                            <span class="text-white text-xs">{{ substr($testimonial->name, 0, 2) }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $testimonial->name }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs text-secondary mb-0">{{ $testimonial->position }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs text-secondary mb-0">{{ $testimonial->company ?: 'N/A' }}</p>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                @for($i = 0; $i < $testimonial->rating; $i++)
                                                    <i class="fas fa-star text-warning"></i>
                                                @endfor
                                                @for($i = $testimonial->rating; $i < 5; $i++)
                                                    <i class="fas fa-star text-muted"></i>
                                                @endfor
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if($testimonial->is_active)
                                                <span class="badge badge-sm bg-gradient-success">Active</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $testimonial->sort_order }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex">
                                                <a href="{{ route('admin.testimonial.edit', $testimonial) }}" 
                                                   class="btn btn-sm btn-outline-primary me-2">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.testimonial.destroy', $testimonial) }}" 
                                                      method="POST" class="d-inline" 
                                                      onsubmit="return confirm('Are you sure you want to delete this testimonial?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-4">
                                            <p class="text-muted mb-0">No testimonials found.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
