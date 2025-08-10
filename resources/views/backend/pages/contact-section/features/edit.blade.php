@extends('backend')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-1">Edit Contact Feature</h4>
                <p class="text-muted mb-0">Update contact feature for "{{ $contactSection->title_black }} {{ $contactSection->title_blue }}"</p>
            </div>
            <a href="{{ route('admin.contact-section.features', $contactSection) }}" class="btn btn-sm btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i>Back to Features
            </a>
        </div>
        
        <div class="card-body">
            <form action="{{ route('admin.contact-section.features.update', [$contactSection, $feature]) }}" method="POST">
                @csrf
                @method('PUT')
                @include('backend.pages.contact-section.features.form')
                
                <div class="row mt-4">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="fas fa-save me-1"></i>Update Contact Feature
                        </button>
                        <a href="{{ route('admin.contact-section.features', $contactSection) }}" class="btn btn-outline-secondary">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
