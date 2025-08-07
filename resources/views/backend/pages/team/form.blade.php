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

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Facebook URL</label>
            <input type="url" name="facebook" class="form-control" 
                   value="{{ old('facebook', $team->facebook ?? '') }}" 
                   placeholder="https://facebook.com/username">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Twitter URL</label>
            <input type="url" name="twitter" class="form-control" 
                   value="{{ old('twitter', $team->twitter ?? '') }}" 
                   placeholder="https://twitter.com/username">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Instagram URL</label>
            <input type="url" name="instagram" class="form-control" 
                   value="{{ old('instagram', $team->instagram ?? '') }}" 
                   placeholder="https://instagram.com/username">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>LinkedIn URL</label>
            <input type="url" name="linkedin" class="form-control" 
                   value="{{ old('linkedin', $team->linkedin ?? '') }}" 
                   placeholder="https://linkedin.com/in/username">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Sort Order</label>
            <input type="number" name="sort_order" class="form-control" 
                   value="{{ old('sort_order', $team->sort_order ?? 0) }}">
            <small class="text-muted">Lower numbers appear first</small>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <div class="form-check form-switch mt-4">
                <input type="hidden" name="is_active" value="0">
                <input class="form-check-input" type="checkbox" name="is_active" value="1"
                       {{ old('is_active', $team->is_active ?? true) ? 'checked' : '' }}>
                <label class="form-check-label">Active Status</label>
            </div>
        </div>
    </div>
</div>
