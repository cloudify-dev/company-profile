@extends('backend')
@section('content')
    <div class="card mb-4">
        <div class="card-header justify-content-between align-items-center">
            <h4>Add Breadcrumb Slide</h4>
            <form action="{{ route('admin.breadcrumb.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('backend.pages.breadcrumb.form')
                <button class="btn btn-primary mt-2">Save</button>
            </form>
        </div>
    </div>
@endsection
