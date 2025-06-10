@extends('backend')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Project List</h6>
            <a href="{{ route('admin.project.create') }}" class="btn btn-primary btn-sm">Add Project</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($projects as $project)
                        <tr>
                            <td><img src="{{ asset('storage/' . $project->image) }}" class="avatar avatar-sm me-3"
                                    alt="{{ $project->title }}"></td>
                            <td> <a href="#">{{ $project->title }}</a></td>
                            <td> <a href="#">{{ $project->category }}</a></td>
                            <td>{{ Str::limit($project->description, 50) }}</td>
                            <td>
                                <a href="{{ route('admin.project.edit', $project->id) }}"
                                    class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('admin.project.destroy', $project->id) }}" method="POST"
                                    style="display:inline-block">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Delete this project?')"
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
