@extends('backend')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Breadcrumb List</h6>
            <a href="{{ route('admin.breadcrumb.create') }}" class="btn btn-primary btn-sm">Add Breadcrumb</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Breadcrumb Title</th>
                        <th>Page Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($breadcrumbs as $breadcrumb)
                        <tr>
                            <td>
                                @if ($breadcrumb->breadcrumb_image)
                                    <img src="{{ asset('storage/' . $breadcrumb->breadcrumb_image) }}"
                                        class="avatar avatar-sm me-3" alt="Image">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>{{ $breadcrumb->breadcrumb_title ?? '-' }}</td>
                            <td>{{ $breadcrumb->page_name }}</td>
                            <td>
                                <a href="{{ route('admin.breadcrumb.edit', $breadcrumb->id) }}"
                                    class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('admin.breadcrumb.destroy', $breadcrumb->id) }}" method="POST"
                                    style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Delete this breadcrumb?')"
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
