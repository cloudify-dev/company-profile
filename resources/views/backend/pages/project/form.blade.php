@php $project = $project ?? null; @endphp

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
    <!-- Left Column -->
    <div class="col-md-8">
        <!-- Basic Information -->
        <div class="card shadow-sm mb-4">
            <div class="card-header">
                <h6 class="mb-0">Basic Information</h6>
            </div>
            <div class="card-body pt-0">
                <div class="form-group mb-3">
                    <label class="form-label">Project Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" 
                           value="{{ old('title', $project->title ?? '') }}" 
                           placeholder="Enter project title"
                           required>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">Category <span class="text-danger">*</span></label>
                            <select name="category" class="form-control" required>
                                <option value="">Select Category</option>
                                <option value="IT Technology" {{ old('category', $project->category ?? '') == 'IT Technology' ? 'selected' : '' }}>IT Technology</option>
                                <option value="Web Development" {{ old('category', $project->category ?? '') == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                                <option value="Mobile App" {{ old('category', $project->category ?? '') == 'Mobile App' ? 'selected' : '' }}>Mobile App</option>
                                <option value="UI/UX Design" {{ old('category', $project->category ?? '') == 'UI/UX Design' ? 'selected' : '' }}>UI/UX Design</option>
                                <option value="E-commerce" {{ old('category', $project->category ?? '') == 'E-commerce' ? 'selected' : '' }}>E-commerce</option>
                                <option value="Consulting" {{ old('category', $project->category ?? '') == 'Consulting' ? 'selected' : '' }}>Consulting</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">Client Name</label>
                            <input type="text" name="client" class="form-control" 
                                   value="{{ old('client', $project->client ?? '') }}" 
                                   placeholder="Client or company name">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" class="form-control" 
                                   value="{{ old('location', $project->location ?? '') }}" 
                                   placeholder="Project location">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">Completion Date</label>
                            <input type="date" name="completion_date" class="form-control" 
                                value="{{ old('completion_date', $project?->completion_date ? $project->completion_date->format('Y-m-d') : '') }}">
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Project Description <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" rows="5" 
                              placeholder="Describe the project details, objectives, and key features"
                              required>{{ old('description', $project->description ?? '') }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Demo URL</label>
                    <input type="url" name="demo_url" class="form-control" 
                           value="{{ old('demo_url', $project->demo_url ?? '') }}" 
                           placeholder="https://example.com">
                    <small class="text-muted">Live project URL (if available)</small>
                </div>
            </div>
        </div>

        <!-- Challenge Section -->
        <div class="card shadow-sm mb-4">
            <div class="card-header">
                <h6 class="mb-0">Project Challenges</h6>
            </div>
            <div class="card-body pt-0">
                <div class="form-group mb-3">
                    <label class="form-label">Challenge Description</label>
                    <textarea name="challenges" class="form-control" rows="4" 
                              placeholder="Describe the main challenges faced in this project">{{ old('challenges', $project->challenges ?? '') }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Challenge Points</label>
                    <div id="challenge-points-container">
                        @if($project && $project->challenge_points)
                            @foreach($project->challenge_points as $index => $point)
                                <div class="input-group mb-2 challenge-point-item">
                                    <input type="text" name="challenge_points[]" class="form-control" 
                                           value="{{ old('challenge_points.' . $index, $point) }}" 
                                           placeholder="Enter challenge point">
                                    <button type="button" class="btn btn-outline-danger remove-challenge-point mb-0">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            @endforeach
                        @else
                            <div class="input-group mb-2 challenge-point-item">
                                <input type="text" name="challenge_points[]" class="form-control" 
                                       placeholder="Enter challenge point">
                                <button type="button" class="btn btn-outline-danger remove-challenge-point">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endif
                    </div>
                    <button type="button" id="add-challenge-point" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-plus"></i> Add Challenge Point
                    </button>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Upload Challenge Image</label>
                    <input type="file" name="challenge_image" class="form-control" accept="image/*">
                    <small class="text-muted">Image for challenge section. Recommended: 311x215px, Max: 2MB</small>
                </div>
                @if (!empty($project->challenge_image))
                    <div class="current-image">
                        <label class="form-label">Current Challenge Image:</label>
                        <img src="{{ asset('storage/' . $project->challenge_image) }}" 
                             class="img-fluid rounded shadow-sm" 
                             style="max-height: 150px; width: 100%; object-fit: cover;"
                             alt="Current challenge image">
                    </div>
                @endif
            </div>
        </div>

        <!-- Results Section -->
        <div class="card shadow-sm mb-4">
            <div class="card-header">
                <h6 class="mb-0">Project Results</h6>
            </div>
            <div class="card-body pt-0">
                <div class="form-group mb-3">
                    <label class="form-label">Results Description</label>
                    <textarea name="results" class="form-control" rows="4" 
                              placeholder="Describe the results and outcomes of this project">{{ old('results', $project->results ?? '') }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Result Images</label>
                    <input type="file" name="result_images[]" class="form-control" accept="image/*" multiple>
                    <small class="text-muted">Select multiple images for project results. Recommended: 352x215px, Max: 5MB each</small>
                    
                    @if($project && $project->result_images)
                        <div class="mt-3">
                            <label class="form-label">Current Result Images:</label>
                            <div class="row">
                                @foreach($project->result_images as $resultImage)
                                    <div class="col-md-6 mb-2">
                                        <img src="{{ asset('storage/' . $resultImage) }}" 
                                             class="img-fluid rounded shadow-sm" 
                                             style="max-height: 150px; width: 100%; object-fit: cover;"
                                             alt="Result image">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column -->
    <div class="col-md-4">
        <!-- Project Image -->
        <div class="card shadow-sm mb-4">
            <div class="card-header">
                <h6 class="mb-0">Main Project Image</h6>
            </div>
            <div class="card-body pt-0">
                <div class="form-group mb-3">
                    <label class="form-label">Upload Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    <small class="text-muted">Recommended: 800x600px, Max: 2MB</small>
                </div>
                @if (!empty($project->image))
                    <div class="current-image">
                        <label class="form-label">Current Image:</label>
                        <img src="{{ asset('storage/' . $project->image) }}" 
                             class="img-fluid rounded shadow-sm" 
                             style="max-height: 200px; width: 100%; object-fit: cover;"
                             alt="Current project image">
                    </div>
                @endif
            </div>
        </div>

        <!-- Project Settings -->
        <div class="card shadow-sm mb-4">
            <div class="card-header">
                <h6 class="mb-0">Brochures & Downloads</h6>
            </div>
            <div class="card-body pt-0">
                <div class="form-group mb-3">
                    <label class="form-label">PDF Brochure</label>
                    <input type="file" name="brochure_pdf" class="form-control" accept=".pdf">
                    <small class="text-muted">Upload PDF brochure file. Max: 10MB</small>
                    @if (!empty($project->brochure_pdf))
                        <div class="mt-2">
                            <label class="form-label">Current PDF:</label>
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-file-pdf text-danger"></i>
                                <a href="{{ asset('storage/' . $project->brochure_pdf) }}" target="_blank" class="text-decoration-none">
                                    {{ basename($project->brochure_pdf) }}
                                </a>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">DOC Brochure</label>
                    <input type="file" name="brochure_doc" class="form-control" accept=".doc,.docx">
                    <small class="text-muted">Upload DOC/DOCX brochure file. Max: 10MB</small>
                    @if (!empty($project->brochure_doc))
                        <div class="mt-2">
                            <label class="form-label">Current DOC:</label>
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-file-word text-primary"></i>
                                <a href="{{ asset('storage/' . $project->brochure_doc) }}" target="_blank" class="text-decoration-none">
                                    {{ basename($project->brochure_doc) }}
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Help Banner -->
        <div class="card shadow-sm mb-4">
            <div class="card-header">
                <h6 class="mb-0">Help Banner Image</h6>
            </div>
            <div class="card-body pt-0">
                <div class="form-group mb-3">
                    <label class="form-label">Upload Banner Image</label>
                    <input type="file" name="help_banner_image" class="form-control" accept="image/*">
                    <small class="text-muted">"You Need Help?" section banner. Recommended: 391x467px, Max: 2MB</small>
                </div>
                @if (!empty($project->help_banner_image))
                    <div class="current-image">
                        <label class="form-label">Current Banner:</label>
                        <img src="{{ asset('storage/' . $project->help_banner_image) }}" 
                             class="img-fluid rounded shadow-sm" 
                             style="max-height: 150px; width: 100%; object-fit: cover;"
                             alt="Current help banner image">
                    </div>
                @endif
            </div>
        </div>

        <!-- Project Settings -->
        <div class="card shadow-sm mb-4">
            <div class="card-header">
                <h6 class="mb-0">Project Settings</h6>
            </div>
            <div class="card-body pt-0">
                <div class="form-group mb-3">
                    <label class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" 
                           value="{{ old('sort_order', $project->sort_order ?? 0) }}" 
                           min="0">
                    <small class="text-muted">Lower numbers appear first</small>
                </div>

                <div class="form-group mb-3">
                    <div class="form-check form-switch">
                        <input type="hidden" name="is_active" value="0">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1"
                               {{ old('is_active', $project->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label">Active Status</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add Challenge Point
    document.getElementById('add-challenge-point').addEventListener('click', function() {
        const container = document.getElementById('challenge-points-container');
        const newItem = document.createElement('div');
        newItem.className = 'input-group mb-2 challenge-point-item';
        newItem.innerHTML = `
            <input type="text" name="challenge_points[]" class="form-control" placeholder="Enter challenge point">
            <button type="button" class="btn btn-outline-danger remove-challenge-point">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(newItem);
        
        // Add event listener to remove button
        newItem.querySelector('.remove-challenge-point').addEventListener('click', function() {
            newItem.remove();
        });
    });

    // Remove Challenge Point
    document.querySelectorAll('.remove-challenge-point').forEach(function(button) {
        button.addEventListener('click', function() {
            this.closest('.challenge-point-item').remove();
        });
    });
});
</script>
