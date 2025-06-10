@php
    $breadcrumb = $breadcrumb ?? null;
@endphp


@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="form-group">
    <label>Page Name</label>
    <input type="text" name="page_name" class="form-control" value="{{ old('page_name', $breadcrumb->page_name ?? '') }}"
        required>
</div>
<div class="form-group">
    <label>Breadcrumb Title</label>
    <input type="text" name="breadcrumb_title" class="form-control"
        value="{{ old('breadcrumb_title', $breadcrumb->breadcrumb_title ?? '') }}" required>
</div>
<div class="form-group">
    <label>Breadcrumb Image</label>
    <input type="file" name="breadcrumb_image" class="form-control">
    @if (!empty($breadcrumb->breadcrumb_image))
        <img src="{{ asset('storage/' . $breadcrumb->breadcrumb_image) }}" width="100" class="mt-2">
    @endif
</div>
