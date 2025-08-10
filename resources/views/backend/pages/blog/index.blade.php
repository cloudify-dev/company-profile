@extends('backend')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="mb-0">Blog List</h6>
        <div class="d-flex">
            <!-- <a href="{{ route('admin.service.page-settings') }}" class="btn btn-warning btn-sm me-2">Page Settings</a> -->
            <div>
                <a href="{{ route('admin.blog.create') }}" class="btn btn-primary btn-sm">Add Blog</a>
            </div>
            <form method="GET" action="{{ route('admin.blog.index') }}">
                <div class="ms-2" style="min-width: 150px;">
                    <select class="form-select form-select-sm" name="category_id" onchange="this.form.submit()">
                        <option value="">All Categories</option>
                        @foreach($blogCategories as $category)
                        <option value="{{ $category->blog_category_id }}"
                            {{ request('category_id') == $category->blog_category_id ? 'selected' : '' }}>
                            {{ $category->text }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Tag</th>
                    <th>Quote</th>
                    <th>Comment</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($blogs as $blog)
                <tr>
                    <!-- <td>{{$blog}}</td> -->
                    <td>{{ $blog->title }}</td>
                    <td>{{ Str::limit($blog->description, 50) }}</td>
                    <td> @if($blog->blogTags->isNotEmpty())
                            @foreach($blog->blogTags as $tag)
                                {{ $tag->tag_name }}
                            @endforeach
                        @else
                        -
                        @endif
                    </td>
                    <td> @if($blog->blogQuote)
                        {{ Str::limit($blog->blogQuote->text, 30) }}
                        @else
                        -
                        @endif
                    </td>
                    <td>@if($blog->blogComments->isNotEmpty())
                        {{ $blog->blogComments->count() }}
                        @else
                        -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.blog.edit', $blog->blog_id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.blog.destroy', $blog->blog_id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No blogs found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection