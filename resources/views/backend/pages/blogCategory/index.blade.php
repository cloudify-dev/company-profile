@extends('backend')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Blog Category</h6>
            <div>
                <!-- <a href="{{ route('admin.service.page-settings') }}" class="btn btn-warning btn-sm me-2">Page Settings</a> -->
                <a href="{{ route('admin.blogCategory.create') }}" class="btn btn-primary btn-sm">Add Category</a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogCategories as $blogCategory)
                        <tr>
                            <td>{{ $blogCategory->text }}</td>
                            <td>
                                <a href="{{ route('admin.blogCategory.edit', $blogCategory->blog_category_id) }}"
                                    class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('admin.blogCategory.destroy', $blogCategory->blog_category_id) }}" method="POST"
                                    style="display:inline-block">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Delete this Cateogry?')"
                                        class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
