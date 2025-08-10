<div class="row">
    <!-- Feature Information -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Contact Feature Information</h6>
            </div>
            <div class="card-body">
                <!-- Label -->
                <div class="mb-3">
                    <label for="label" class="form-label">Label <span class="text-danger">*</span></label>
                    <input type="text" 
                           class="form-control @error('label') is-invalid @enderror" 
                           id="label" 
                           name="label" 
                           value="{{ old('label', $feature->label ?? '') }}" 
                           placeholder="Call Us On:">
                    @error('label')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">The label text that appears above the contact value</div>
                </div>

                <!-- Value -->
                <div class="mb-3">
                    <label for="value" class="form-label">Value <span class="text-danger">*</span></label>
                    <input type="text" 
                           class="form-control @error('value') is-invalid @enderror" 
                           id="value" 
                           name="value" 
                           value="{{ old('value', $feature->value ?? '') }}" 
                           placeholder="+190-8800-0393">
                    @error('value')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">The contact value (phone number, email, address, etc.)</div>
                </div>

                <!-- Link -->
                <div class="mb-3">
                    <label for="link" class="form-label">Link</label>
                    <input type="text" 
                           class="form-control @error('link') is-invalid @enderror" 
                           id="link" 
                           name="link" 
                           value="{{ old('link', $feature->link ?? '') }}" 
                           placeholder="tel:+19088000393">
                    @error('link')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">
                        Optional: The link URL (e.g., tel:+1234567890, mailto:email@example.com, https://example.com)
                    </div>
                </div>

                <!-- Icon -->
                <div class="mb-3">
                    <label for="icon" class="form-label">Icon Class <span class="text-danger">*</span></label>
                    <input type="text" 
                           class="form-control @error('icon') is-invalid @enderror" 
                           id="icon" 
                           name="icon" 
                           value="{{ old('icon', $feature->icon ?? 'fa-solid fa-phone') }}" 
                           placeholder="fa-solid fa-phone">
                    @error('icon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">
                        FontAwesome icon class. 
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
                <!-- Preview -->
                <div class="mb-3">
                    <label class="form-label">Preview</label>
                    <div class="border rounded p-3 bg-light">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <div class="icon-btn bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i id="icon-preview" class="{{ old('icon', $feature->icon ?? 'fa-solid fa-phone') }}"></i>
                                </div>
                            </div>
                            <div>
                                <p class="mb-0 text-xs text-muted" id="label-preview">{{ old('label', $feature->label ?? 'Call Us On:') }}</p>
                                <span class="text-sm font-weight-bold" id="value-preview">{{ old('value', $feature->value ?? '+190-8800-0393') }}</span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <small class="text-muted">Preview of contact feature</small>
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

                <!-- Common Contact Icons -->
                <div class="mb-3">
                    <label class="form-label">Common Contact Icons</label>
                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary icon-select-btn" data-icon="fa-solid fa-phone">
                            <i class="fa-solid fa-phone"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary icon-select-btn" data-icon="fa-solid fa-envelope">
                            <i class="fa-solid fa-envelope"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary icon-select-btn" data-icon="fa-solid fa-map-marker-alt">
                            <i class="fa-solid fa-map-marker-alt"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary icon-select-btn" data-icon="fa-solid fa-clock">
                            <i class="fa-solid fa-clock"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary icon-select-btn" data-icon="fa-brands fa-whatsapp">
                            <i class="fa-brands fa-whatsapp"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary icon-select-btn" data-icon="fa-solid fa-fax">
                            <i class="fa-solid fa-fax"></i>
                        </button>
                    </div>
                    <div class="form-text">Click to use these common contact icons</div>
                </div>

                <!-- Link Type Helper -->
                <div class="mb-3">
                    <label class="form-label">Quick Link Types</label>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-sm btn-outline-info link-helper-btn" data-prefix="tel:" data-placeholder="tel:+1234567890">
                            Phone Link
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-info link-helper-btn" data-prefix="mailto:" data-placeholder="mailto:email@example.com">
                            Email Link
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-info link-helper-btn" data-prefix="https://" data-placeholder="https://example.com">
                            Website Link
                        </button>
                    </div>
                    <div class="form-text">Click to add common link prefixes</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const iconInput = document.getElementById('icon');
    const labelInput = document.getElementById('label');
    const valueInput = document.getElementById('value');
    const linkInput = document.getElementById('link');
    
    const iconPreview = document.getElementById('icon-preview');
    const labelPreview = document.getElementById('label-preview');
    const valuePreview = document.getElementById('value-preview');
    
    const iconSelectButtons = document.querySelectorAll('.icon-select-btn');
    const linkHelperButtons = document.querySelectorAll('.link-helper-btn');
    
    // Update preview when inputs change
    iconInput.addEventListener('input', function() {
        iconPreview.className = this.value;
    });
    
    labelInput.addEventListener('input', function() {
        labelPreview.textContent = this.value || 'Call Us On:';
    });
    
    valueInput.addEventListener('input', function() {
        valuePreview.textContent = this.value || '+190-8800-0393';
    });
    
    // Handle icon selection buttons
    iconSelectButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const iconClass = this.dataset.icon;
            iconInput.value = iconClass;
            iconPreview.className = iconClass;
        });
    });
    
    // Handle link helper buttons
    linkHelperButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const prefix = this.dataset.prefix;
            const placeholder = this.dataset.placeholder;
            
            if (!linkInput.value || linkInput.value === placeholder) {
                linkInput.value = placeholder;
            } else if (!linkInput.value.startsWith(prefix)) {
                linkInput.value = prefix + linkInput.value;
            }
            
            linkInput.focus();
        });
    });
});
</script>
