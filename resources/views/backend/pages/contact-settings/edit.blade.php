@extends('backend')
@section('content')
    <div class="card mb-4">
        <div class="card-header justify-content-between align-items-center">
            <h4>Edit Contact Setting</h4>
            <form action="{{ route('admin.contact-settings.update', $contactSetting->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                @include('backend.pages.contact-settings.form', ['contactSetting' => $contactSetting])
                <button class="btn btn-primary mt-2">Update</button>
            </form>
        </div>
    </div>
@endsection
