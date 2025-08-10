<div class="row">
    <!-- Basic Information -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Section Information</h6>
            </div>
            <div class="card-body">
                <!-- Subtitle -->
                <div class="mb-3">
                    <label for="subtitle" class="form-label">Subtitle <span class="text-danger">*</span></label>
                    <input type="text" 
                           class="form-control @error('subtitle') is-invalid @enderror" 
                           id="subtitle" 
                           name="subtitle" 
                           value="{{ old('subtitle', $whyChooseUs->subtitle ?? 'WHY CHOOSE US') }}" 
                           placeholder="WHY CHOOSE US">
                    @error('subtitle')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Title Black -->
                <div class="mb-3">
                    <label for="title_black" class="form-label">Title (Black Part) <span class="text-danger">*</span></label>
                    <input type="text" 
                           class="form-control @error('title_black') is-invalid @enderror" 
                           id="title_black" 
                           name="title_black" 
                           value="{{ old('title_black', $whyChooseUs->title_black ?? '') }}" 
                           placeholder="We Deal With The Aspects Professional">
                    @error('title_black')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Title Blue -->
                <div class="mb-3">
                    <label for="title_blue" class="form-label">Title (Blue Part) <span class="text-danger">*</span></label>
                    <input type="text" 
                           class="form-control @error('title_blue') is-invalid @enderror" 
                           id="title_blue" 
                           name="title_blue" 
                           value="{{ old('title_blue', $whyChooseUs->title_blue ?? '') }}" 
                           placeholder="IT Services">
                    @error('title_blue')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" 
                              name="description" 
                              rows="4" 
                              placeholder="Enter section description">{{ old('description', $whyChooseUs->description ?? '') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Sort Order -->
                <div class="mb-3">
                    <label for="sort_order" class="form-label">Sort Order</label>
                    <input type="number" 
                           class="form-control @error('sort_order') is-invalid @enderror" 
                           id="sort_order" 
                           name="sort_order" 
                           value="{{ old('sort_order', $whyChooseUs->sort_order ?? 0) }}" 
                           min="0">
                    @error('sort_order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <!-- Image and Status -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Image & Settings</h6>
            </div>
            <div class="card-body">
                <!-- Current Image -->
                @if(isset($whyChooseUs) && $whyChooseUs->image)
                    <div class="mb-3">
                        <label class="form-label">Current Image</label>
                        <div class="text-center">
                            <img src="{{ asset('storage/' . $whyChooseUs->image) }}" 
                                 alt="Current Image" 
                                 class="img-fluid rounded border"
                                 style="max-height: 200px;">
                        </div>
                    </div>
                @endif

                <!-- Image Upload -->
                <div class="mb-3">
                    <label for="image" class="form-label">
                        {{ isset($whyChooseUs) && $whyChooseUs->image ? 'Replace Image' : 'Upload Image' }}
                    </label>
                    <input type="file" 
                           class="form-control @error('image') is-invalid @enderror" 
                           id="image" 
                           name="image" 
                           accept="image/*">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Max size: 2MB. Supported formats: JPG, PNG, GIF</div>
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" 
                               type="checkbox" 
                               id="is_active" 
                               name="is_active" 
                               value="1" 
                               {{ old('is_active', $whyChooseUs->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">
                            Active
                        </label>
                    </div>
                </div>
            </div>
        </div>

        @if(isset($whyChooseUs))
            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="mb-0">Quick Actions</h6>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.why-choose-us.features', $whyChooseUs) }}" 
                       class="btn btn-info btn-sm w-100 mb-2">
                        <i class="fas fa-list me-1"></i>Manage Features ({{ $whyChooseUs->features->count() }})
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
