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
        <div class="card shadow-sm mb-4">
            <div class="card-header">
                <h6 class="mb-0">Project Information</h6>
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
                                <option value="web" {{ old('category', $project->category ?? '') == 'web' ? 'selected' : '' }}>Web Development</option>
                                <option value="mobile" {{ old('category', $project->category ?? '') == 'mobile' ? 'selected' : '' }}>Mobile App</option>
                                <option value="desktop" {{ old('category', $project->category ?? '') == 'desktop' ? 'selected' : '' }}>Desktop Application</option>
                                <option value="ui-ux" {{ old('category', $project->category ?? '') == 'ui-ux' ? 'selected' : '' }}>UI/UX Design</option>
                                <option value="branding" {{ old('category', $project->category ?? '') == 'branding' ? 'selected' : '' }}>Branding</option>
                                <option value="ecommerce" {{ old('category', $project->category ?? '') == 'ecommerce' ? 'selected' : '' }}>E-commerce</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">Client Name</label>
                            <input type="text" name="client_name" class="form-control" 
                                   value="{{ old('client_name', $project->client_name ?? '') }}" 
                                   placeholder="Client or company name">
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
                    <label class="form-label">Project URL</label>
                    <input type="url" name="project_url" class="form-control" 
                           value="{{ old('project_url', $project->project_url ?? '') }}" 
                           placeholder="https://example.com">
                    <small class="text-muted">Live project URL (if available)</small>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Technologies Used</label>
                    <input type="text" name="technologies" class="form-control" 
                           value="{{ old('technologies', is_array($project->technologies ?? null) ? implode(', ', $project->technologies) : '') }}" 
                           placeholder="Laravel, Vue.js, MySQL, AWS">
                    <small class="text-muted">Separate multiple technologies with commas</small>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">Project Duration</label>
                            <input type="text" name="duration" class="form-control" 
                                   value="{{ old('duration', $project->duration ?? '') }}" 
                                   placeholder="3 months">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">Budget Range</label>
                            <select name="budget_range" class="form-control">
                                <option value="">Select Budget Range</option>
                                <option value="under-5k" {{ old('budget_range', $project->budget_range ?? '') == 'under-5k' ? 'selected' : '' }}>Under $5,000</option>
                                <option value="5k-10k" {{ old('budget_range', $project->budget_range ?? '') == '5k-10k' ? 'selected' : '' }}>$5,000 - $10,000</option>
                                <option value="10k-25k" {{ old('budget_range', $project->budget_range ?? '') == '10k-25k' ? 'selected' : '' }}>$10,000 - $25,000</option>
                                <option value="25k-50k" {{ old('budget_range', $project->budget_range ?? '') == '25k-50k' ? 'selected' : '' }}>$25,000 - $50,000</option>
                                <option value="above-50k" {{ old('budget_range', $project->budget_range ?? '') == 'above-50k' ? 'selected' : '' }}>Above $50,000</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Members (if needed) -->
        <div class="card shadow-sm mb-4 d-none d-md-block">
            <div class="card-header">
                <h6 class="mb-0">Additional Info</h6>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-12 col-md-6 form-group">
                        <label class="form-label">Team Size</label>
                        <select name="team_size" class="form-control">
                            <option value="">Select Team Size</option>
                            <option value="1" {{ old('team_size', $project->team_size ?? '') == '1' ? 'selected' : '' }}>Solo (1 person)</option>
                            <option value="2-3" {{ old('team_size', $project->team_size ?? '') == '2-3' ? 'selected' : '' }}>Small (2-3 people)</option>
                            <option value="4-6" {{ old('team_size', $project->team_size ?? '') == '4-6' ? 'selected' : '' }}>Medium (4-6 people)</option>
                            <option value="7+" {{ old('team_size', $project->team_size ?? '') == '7+' ? 'selected' : '' }}>Large (7+ people)</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-6 form-group">
                        <label class="form-label">Project Tags</label>
                        <input type="text" name="tags" class="form-control" 
                            value="{{ old('tags', $project->tags ?? '') }}" 
                            placeholder="responsive, api, dashboard">
                        <small class="text-muted">Separate tags with commas</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column -->
    <div class="col-md-4">
        <!-- Project Image -->
        <div class="card shadow-sm mb-4">
            <div class="card-header">
                <h6 class="mb-0">Project Image</h6>
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
                <h6 class="mb-0">Project Settings</h6>
            </div>
            <div class="card-body pt-0">
                <div class="form-group mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="active" {{ old('status', $project->status ?? 'active') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $project->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <!-- <option value="draft" {{ old('status', $project->status ?? '') == 'draft' ? 'selected' : '' }}>Draft</option> -->
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" 
                           value="{{ old('sort_order', $project->sort_order ?? 0) }}" 
                           min="0">
                    <small class="text-muted">Lower numbers appear first</small>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Completion Date</label>
                    <input type="date" name="completion_date" class="form-control" 
                           value="{{ old('completion_date', $project->completion_date ?? '') }}">
                </div>

                <div class="form-group mb-3">
                    <div class="form-check">
                        <input type="checkbox" name="is_featured" value="1" 
                               class="form-check-input" id="is_featured"
                               {{ old('is_featured', $project->is_featured ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">
                            <strong>Featured Project</strong>
                            <br><small class="text-muted">Show in featured section</small>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Members (if needed) -->
        <div class="card shadow-sm mb-4 d-block d-md-none">
            <div class="card-header">
                <h6 class="mb-0">Additional Info</h6>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-12 col-md-6 form-group">
                        <label class="form-label">Team Size</label>
                        <select name="team_size" class="form-control">
                            <option value="">Select Team Size</option>
                            <option value="1" {{ old('team_size', $project->team_size ?? '') == '1' ? 'selected' : '' }}>Solo (1 person)</option>
                            <option value="2-3" {{ old('team_size', $project->team_size ?? '') == '2-3' ? 'selected' : '' }}>Small (2-3 people)</option>
                            <option value="4-6" {{ old('team_size', $project->team_size ?? '') == '4-6' ? 'selected' : '' }}>Medium (4-6 people)</option>
                            <option value="7+" {{ old('team_size', $project->team_size ?? '') == '7+' ? 'selected' : '' }}>Large (7+ people)</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-6 form-group">
                        <label class="form-label">Project Tags</label>
                        <input type="text" name="tags" class="form-control" 
                            value="{{ old('tags', $project->tags ?? '') }}" 
                            placeholder="responsive, api, dashboard">
                        <small class="text-muted">Separate tags with commas</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
