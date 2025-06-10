@extends('backend')
@section('content')
    <div class="card mb-4">
        <div class="card-header justify-content-between align-items-center">
            <h4>Add Team</h4>
            <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('backend.pages.team.form')
                <button class="btn btn-primary mt-2">Save</button>
            </form>
        </div>
    </div>
@endsection
