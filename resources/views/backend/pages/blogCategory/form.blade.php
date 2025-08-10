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
    <label>Category Name</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $blogCategory->title ?? '') }}" required>
</div>

