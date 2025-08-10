@extends('backend')
@section('content')
    <div class="card mb-4">
        <div class="card-header justify-content-between align-items-center">
            <h4>Edit Blog Category</h4>
            <form action="{{ route('admin.blogCategory.update', $blogCategory->blog_category_id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                @include('backend.pages.blogCategory.form', ['blogCategory' => $blogCategory])
                <button class="btn btn-primary mt-2">Update</button>
            </form>
        </div>
    </div>
@endsection
