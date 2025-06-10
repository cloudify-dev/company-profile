@php $service = $service ?? null; @endphp

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
    <label>Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $service->title ?? '') }}" required>
</div>
<div class="form-group">
    <label>Description</label>
    <textarea name="description" class="form-control" required>{{ old('description', $service->description ?? '') }}</textarea>
</div>
<div class="form-group">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
    @if (!empty($service->image))
        <img src="{{ asset('storage/' . $service->image) }}" width="100" class="mt-2">
    @endif
</div>
