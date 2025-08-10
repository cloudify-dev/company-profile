@extends('backend')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-1">Edit Feature</h4>
                <p class="text-muted mb-0">Update feature for "{{ $whyChooseUs->title_black }} {{ $whyChooseUs->title_blue }}"</p>
            </div>
            <a href="{{ route('admin.why-choose-us.features', $whyChooseUs) }}" class="btn btn-sm btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i>Back to Features
            </a>
        </div>
        
        <div class="card-body">
            <form action="{{ route('admin.why-choose-us.features.update', [$whyChooseUs, $feature]) }}" method="POST">
                @csrf
                @method('PUT')
                @include('backend.pages.why-choose-us.features.form')
                
                <div class="row mt-4">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="fas fa-save me-1"></i>Update Feature
                        </button>
                        <a href="{{ route('admin.why-choose-us.features', $whyChooseUs) }}" class="btn btn-outline-secondary">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
