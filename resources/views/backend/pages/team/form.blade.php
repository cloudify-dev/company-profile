@php $team = $team ?? null; @endphp

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
    <label>Nama</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $team->name ?? '') }}" required>
</div>

<div class="form-group">
    <label>Position</label>
    <input type="text" name="position" class="form-control" value="{{ old('position', $team->position ?? '') }}"
        required>
</div>

<div class="form-group">
    <label>Company</label>
    <input type="text" name="company" class="form-control" value="{{ old('company', $team->company ?? '') }}">
</div>

<div class="form-group">
    <label>Bio</label>
    <textarea name="bio" class="form-control">{{ old('bio', $team->bio ?? '') }}</textarea>
</div>

<div class="form-group">
    <label>Phone</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone', $team->phone ?? '') }}">
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $team->email ?? '') }}">
</div>

<div class="form-group">
    <label>Availability</label>
    <input type="text" name="availability" class="form-control"
        value="{{ old('availability', $team->availability ?? '') }}">
</div>

<div class="form-group">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
    @if (!empty($team->image))
        <img src="{{ asset('storage/' . $team->image) }}" width="100" class="mt-2">
    @endif
</div>
