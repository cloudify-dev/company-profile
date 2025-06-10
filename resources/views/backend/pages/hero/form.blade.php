@php
    $hero = $hero ?? null;
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
    <label>Subtitle</label>
    <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $hero->subtitle ?? '') }}"
        required>
</div>
<div class="form-group">
    <label>Title 1</label>
    <input type="text" name="title_1" class="form-control" value="{{ old('title_1', $hero->title_1 ?? '') }}" required>
</div>
<div class="form-group">
    <label>Title 2</label>
    <input type="text" name="title_2" class="form-control" value="{{ old('title_2', $hero->title_2 ?? '') }}"
        required>
</div>
<div class="form-group">
    <label>Description</label>
    <textarea name="description" class="form-control" required>{{ old('description', $hero->description ?? '') }}</textarea>
</div>
<div class="form-group">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
    @if (!empty($hero->image))
        <img src="{{ asset('storage/' . $hero->image) }}" width="100" class="mt-2">
    @endif
</div>
