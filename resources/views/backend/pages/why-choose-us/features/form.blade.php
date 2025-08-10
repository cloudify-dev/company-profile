<div class="row">
    <!-- Feature Information -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Feature Information</h6>
            </div>
            <div class="card-body">
                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" 
                           class="form-control @error('title') is-invalid @enderror" 
                           id="title" 
                           name="title" 
                           value="{{ old('title', $feature->title ?? '') }}" 
                           placeholder="Big Data Analysis">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" 
                              name="description" 
                              rows="3" 
                              placeholder="Optional description for this feature">{{ old('description', $feature->description ?? '') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Optional: Provide additional description for this feature</div>
                </div>

                <!-- Icon -->
                <div class="mb-3">
                    <label for="icon" class="form-label">Icon Class</label>
                    <input type="text" 
                           class="form-control @error('icon') is-invalid @enderror" 
                           id="icon" 
                           name="icon" 
                           value="{{ old('icon', $feature->icon ?? 'far fa-check') }}" 
                           placeholder="far fa-check">
                    @error('icon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">
                        Icon class (e.g., "far fa-check", "fas fa-star"). 
                        <a href="https://fontawesome.com/icons" target="_blank">Browse FontAwesome icons</a>
                    </div>
                </div>

                <!-- Sort Order -->
                <div class="mb-3">
                    <label for="sort_order" class="form-label">Sort Order</label>
                    <input type="number" 
                           class="form-control @error('sort_order') is-invalid @enderror" 
                           id="sort_order" 
                           name="sort_order" 
                           value="{{ old('sort_order', $feature->sort_order ?? 0) }}" 
                           min="0">
                    @error('sort_order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Lower numbers appear first</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Preview and Status -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Preview & Settings</h6>
            </div>
            <div class="card-body">
                <!-- Icon Preview -->
                <div class="mb-3">
                    <label class="form-label">Icon Preview</label>
                    <div class="border rounded p-3 text-center bg-light">
                        <i id="icon-preview" class="{{ old('icon', $feature->icon ?? 'far fa-check') }} text-primary" style="font-size: 2rem;"></i>
                        <div class="mt-2">
                            <small class="text-muted">Preview of selected icon</small>
                        </div>
                    </div>
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" 
                               type="checkbox" 
                               id="is_active" 
                               name="is_active" 
                               value="1" 
                               {{ old('is_active', $feature->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">
                            Active
                        </label>
                    </div>
                    <div class="form-text">Only active features will be displayed on the frontend</div>
                </div>

                <!-- Common Icons Reference -->
                <div class="mb-3">
                    <label class="form-label">Common Icons</label>
                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary icon-select-btn" data-icon="far fa-check">
                            <i class="far fa-check"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary icon-select-btn" data-icon="fas fa-star">
                            <i class="fas fa-star"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary icon-select-btn" data-icon="fas fa-shield-alt">
                            <i class="fas fa-shield-alt"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary icon-select-btn" data-icon="fas fa-cog">
                            <i class="fas fa-cog"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary icon-select-btn" data-icon="fas fa-chart-line">
                            <i class="fas fa-chart-line"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary icon-select-btn" data-icon="fas fa-users">
                            <i class="fas fa-users"></i>
                        </button>
                    </div>
                    <div class="form-text">Click to use these common icons</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const iconInput = document.getElementById('icon');
    const iconPreview = document.getElementById('icon-preview');
    const iconSelectButtons = document.querySelectorAll('.icon-select-btn');
    
    // Update preview when icon input changes
    iconInput.addEventListener('input', function() {
        iconPreview.className = this.value + ' text-primary';
    });
    
    // Handle icon selection buttons
    iconSelectButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const iconClass = this.dataset.icon;
            iconInput.value = iconClass;
            iconPreview.className = iconClass + ' text-primary';
        });
    });
});
</script>
