@extends('backend')
@section('content')
    <div class="card mb-4">
        <div class="card-header justify-content-between align-items-center">
            <h4>Edit FAQ</h4>
            <form action="{{ route('admin.faq.update', $faq->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                @include('backend.pages.faq.form', ['faq' => $faq])
                <button class="btn btn-primary mt-2">Update</button>
            </form>
        </div>
    </div>
@endsection
