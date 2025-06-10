@extends('backend')
@section('content')
    <div class="card mb-4">
        <div class="card-header justify-content-between align-items-center">
            <h4>Edit Breadcrumb</h4>
            <form action="{{ route('admin.breadcrumb.update', $breadcrumb->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('backend.pages.breadcrumb.form', ['breadcrumb' => $breadcrumb])
                <button class="btn btn-primary mt-2">Update</button>
            </form>
        </div>
    </div>
@endsection
