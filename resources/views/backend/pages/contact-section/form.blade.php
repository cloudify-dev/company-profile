<div class="row">
    <!-- Basic Information -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Section Information</h6>
            </div>
            <div class="card-body">
                <!-- Form Title -->
                <div class="mb-3">
                    <label for="form_title" class="form-label">Form Title <span class="text-danger">*</span></label>
                    <input type="text" 
                           class="form-control @error('form_title') is-invalid @enderror" 
                           id="form_title" 
                           name="form_title" 
                           value="{{ old('form_title', $contactSection->form_title ?? 'Make An Appointment') }}" 
                           placeholder="Make An Appointment">
                    @error('form_title')
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
                <h6 class="mb-0">Background & Settings</h6>
            </div>
            <div class="card-body">
                <!-- Current Background Image -->
                @if(isset($contactSection) && $contactSection->background_image)
                    <div class="mb-3">
                        <label class="form-label">Current Background</label>
                        <div class="text-center">
                            <img src="{{ asset('storage/' . $contactSection->background_image) }}" 
                                 alt="Current Background" 
                                 class="img-fluid rounded border"
                                 style="max-height: 200px;">
                        </div>
                    </div>
                @endif

                <!-- Background Image Upload -->
                <div class="mb-3">
                    <label for="background_image" class="form-label">
                        {{ isset($contactSection) && $contactSection->background_image ? 'Replace Background' : 'Upload Background' }}
                    </label>
                    <input type="file" 
                           class="form-control @error('background_image') is-invalid @enderror" 
                           id="background_image" 
                           name="background_image" 
                           accept="image/*">
                    @error('background_image')
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
                               {{ old('is_active', $contactSection->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">
                            Active
                        </label>
                    </div>
                </div>
            </div>
        </div>

        @if(isset($contactSection))
            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="mb-0">Quick Actions</h6>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.contact-section.features', $contactSection) }}" 
                       class="btn btn-info btn-sm w-100 mb-2">
                        <i class="fas fa-list me-1"></i>Manage Features ({{ $contactSection->features->count() }})
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
