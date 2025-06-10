@extends('backend')
@section('content')
    <div class="card mb-4">
        <div class="card-header justify-content-between align-items-center">
            <h4>Edit Project</h4>
            <form action="{{ route('admin.project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                @include('backend.pages.project.form', ['project' => $project])
                <button class="btn btn-primary mt-2">Update</button>
            </form>
        </div>
    </div>
@endsection
