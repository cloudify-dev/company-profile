<form action="{{ $testimonial ? route('admin.testimonial.update', $testimonial) : route('admin.testimonial.store') }}" 
      method="POST" enctype="multipart/form-data">
    @csrf
    @if($testimonial)
        @method('PUT')
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-control-label">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       name="name" value="{{ old('name', $testimonial->name ?? '') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-control-label">Position <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('position') is-invalid @enderror" 
                       name="position" value="{{ old('position', $testimonial->position ?? '') }}" required>
                @error('position')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-control-label">Company</label>
                <input type="text" class="form-control @error('company') is-invalid @enderror" 
                       name="company" value="{{ old('company', $testimonial->company ?? '') }}">
                @error('company')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-control-label">Rating <span class="text-danger">*</span></label>
                <select class="form-control @error('rating') is-invalid @enderror" name="rating" required>
                    <option value="">Select Rating</option>
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ old('rating', $testimonial->rating ?? '') == $i ? 'selected' : '' }}>
                            {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                        </option>
                    @endfor
                </select>
                @error('rating')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="form-control-label">Review <span class="text-danger">*</span></label>
        <textarea class="form-control @error('review') is-invalid @enderror" 
                  name="review" rows="4" required>{{ old('review', $testimonial->review ?? '') }}</textarea>
        @error('review')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-control-label">Image</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" 
               name="image" accept="image/*">
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        @if($testimonial && $testimonial->image)
            <div class="mt-2">
                <small class="text-muted">Current image:</small><br>
                <img src="{{ asset('storage/' . $testimonial->image) }}" 
                     alt="{{ $testimonial->name }}" class="img-thumbnail" style="max-width: 150px;">
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-control-label">Sort Order</label>
                <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                       name="sort_order" value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}">
                @error('sort_order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Lower numbers appear first</small>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-check form-switch">
                    <input type="hidden" name="is_active" value="0">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1"
                           {{ old('is_active', $testimonial->is_active ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label">Active Status</label>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn bg-gradient-primary">
            <i class="fas fa-save me-1"></i>
            {{ $testimonial ? 'Update' : 'Create' }} Testimonial
        </button>
    </div>
</form>
