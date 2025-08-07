@extends('backend')

@section('title', 'Edit Testimonial')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Edit Testimonial</h6>
                        <a href="{{ route('admin.testimonial.index') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Back to List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @include('backend.pages.testimonial.form', ['testimonial' => $testimonial])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
