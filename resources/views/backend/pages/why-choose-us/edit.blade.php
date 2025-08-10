@extends('backend')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-1">Edit Why Choose Us Section</h4>
                <p class="text-muted mb-0">Update the Why Choose Us section</p>
            </div>
            <a href="{{ route('admin.why-choose-us.index') }}" class="btn btn-sm btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i>Back
            </a>
        </div>
        
        <div class="card-body">
            <form action="{{ route('admin.why-choose-us.update', $whyChooseUs) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('backend.pages.why-choose-us.form')
                
                <div class="row mt-4">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="fas fa-save me-1"></i>Update Section
                        </button>
                        <a href="{{ route('admin.why-choose-us.index') }}" class="btn btn-outline-secondary">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
