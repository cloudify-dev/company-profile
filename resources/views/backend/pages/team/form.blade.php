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

<!-- Basic Information Section -->
<div class="card mb-4">
    <div class="card-header">
        <h5>Basic Information</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name *</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $team->name ?? '') }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Position *</label>
                    <input type="text" name="position" class="form-control" value="{{ old('position', $team->position ?? '') }}" required>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Company</label>
                    <input type="text" name="company" class="form-control" value="{{ old('company', $team->company ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Experience</label>
                    <input type="text" name="experience" class="form-control" value="{{ old('experience', $team->experience ?? '') }}" placeholder="e.g., More Than 10 Years">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Bio</label>
            <textarea name="bio" class="form-control" rows="3">{{ old('bio', $team->bio ?? '') }}</textarea>
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            @if (!empty($team->image))
                <img src="{{ asset('storage/' . $team->image) }}" width="100" class="mt-2">
            @endif
        </div>
    </div>
</div>

<!-- Contact Information Section -->
<div class="card mb-4">
    <div class="card-header">
        <h5>Contact Information</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $team->phone ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $team->email ?? '') }}">
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label>Availability</label>
            <input type="text" name="availability" class="form-control" value="{{ old('availability', $team->availability ?? '') }}" placeholder="e.g., 10:00AM - 4:00PM">
        </div>
    </div>
</div>

<!-- Social Media Section -->
<div class="card mb-4">
    <div class="card-header">
        <h5>Social Media Links</h5>
    </div>
    <div class="card-body">
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
    </div>
</div>

<!-- Biography Section -->
<div class="card mb-4">
    <div class="card-header">
        <h5>Personal Biography</h5>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Personal Biography</label>
            <textarea name="personal_biography" class="form-control" rows="4">{{ old('personal_biography', $team->personal_biography ?? '') }}</textarea>
            <small class="text-muted">This will appear in the "Personal Biography" section</small>
        </div>
    </div>
</div>

<!-- Professional Skills Section -->
<div class="card mb-4">
    <div class="card-header">
        <h5>Professional Skills</h5>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Professional Skills Description</label>
            <textarea name="professional_skills_description" class="form-control" rows="3">{{ old('professional_skills_description', $team->professional_skills_description ?? '') }}</textarea>
        </div>
        
        <div class="form-group">
            <label>Skills</label>
            <div id="skills-container">
                @php
                    $skills = old('skills', $team->skills ?? []);
                    if (empty($skills)) {
                        $skills = [['name' => '', 'percentage' => '']];
                    }
                @endphp
                
                @foreach($skills as $index => $skill)
                <div class="skill-item mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="skills[{{ $index }}][name]" class="form-control" 
                                   placeholder="Skill name (e.g., Wedding Planning)" 
                                   value="{{ $skill['name'] ?? '' }}">
                        </div>
                        <div class="col-md-4">
                            <input type="number" name="skills[{{ $index }}][percentage]" class="form-control" 
                                   placeholder="Percentage" min="0" max="100" 
                                   value="{{ $skill['percentage'] ?? '' }}">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger remove-skill">Remove</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-success" id="add-skill">Add Skill</button>
        </div>
    </div>
</div>

<!-- Activities Section -->
<div class="card mb-4">
    <div class="card-header">
        <h5>Activities</h5>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Activities Description</label>
            <textarea name="activities_description" class="form-control" rows="3">{{ old('activities_description', $team->activities_description ?? '') }}</textarea>
        </div>
        
        <div class="form-group">
            <label>Activities List</label>
            <div id="activities-container">
                @php
                    $activities = old('activities_list', $team->activities_list ?? []);
                    if (empty($activities)) {
                        $activities = [''];
                    }
                @endphp
                
                @foreach($activities as $index => $activity)
                <div class="activity-item mb-2">
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" name="activities_list[]" class="form-control" 
                                   placeholder="Activity item" value="{{ $activity }}">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger remove-activity">Remove</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-success" id="add-activity">Add Activity</button>
        </div>
    </div>
</div>

<!-- Educational Qualification Section -->
<div class="card mb-4">
    <div class="card-header">
        <h5>Educational Qualification</h5>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Educational Qualification</label>
            <textarea name="educational_qualification" class="form-control" rows="3">{{ old('educational_qualification', $team->educational_qualification ?? '') }}</textarea>
        </div>
    </div>
</div>

<!-- Experience Timeline Section -->
<div class="card mb-4">
    <div class="card-header">
        <h5>Experience Timeline</h5>
    </div>
    <div class="card-body">
        <div id="experience-container">
            @php
                $experiences = old('experience_timeline', $team->experience_timeline ?? []);
                if (empty($experiences)) {
                    $experiences = [['position' => '', 'company' => '', 'period' => '', 'order' => 1]];
                }
            @endphp
            
            @foreach($experiences as $index => $experience)
            <div class="experience-item mb-4 border p-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Position</label>
                            <input type="text" name="experience_timeline[{{ $index }}][position]" class="form-control" 
                                   placeholder="e.g., IT Consultant" value="{{ $experience['position'] ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Company</label>
                            <input type="text" name="experience_timeline[{{ $index }}][company]" class="form-control" 
                                   placeholder="e.g., Webteck.Inc" value="{{ $experience['company'] ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Period</label>
                            <input type="text" name="experience_timeline[{{ $index }}][period]" class="form-control" 
                                   placeholder="e.g., 2016 - Present" value="{{ $experience['period'] ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label>Order</label>
                            <input type="number" name="experience_timeline[{{ $index }}][order]" class="form-control" 
                                   value="{{ $experience['order'] ?? ($index + 1) }}">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-danger remove-experience">Remove Experience</button>
            </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-success" id="add-experience">Add Experience</button>
    </div>
</div>

<!-- Settings Section -->
<div class="card mb-4">
    <div class="card-header">
        <h5>Settings</h5>
    </div>
    <div class="card-body">
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
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let skillIndex = {{ count(old('skills', $team->skills ?? [])) }};
    let experienceIndex = {{ count(old('experience_timeline', $team->experience_timeline ?? [])) }};

    // Add Skill
    document.getElementById('add-skill').addEventListener('click', function() {
        const container = document.getElementById('skills-container');
        const div = document.createElement('div');
        div.className = 'skill-item mb-3';
        div.innerHTML = `
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="skills[${skillIndex}][name]" class="form-control" 
                           placeholder="Skill name (e.g., Wedding Planning)">
                </div>
                <div class="col-md-4">
                    <input type="number" name="skills[${skillIndex}][percentage]" class="form-control" 
                           placeholder="Percentage" min="0" max="100">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove-skill">Remove</button>
                </div>
            </div>
        `;
        container.appendChild(div);
        skillIndex++;
    });

    // Remove Skill
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-skill')) {
            e.target.closest('.skill-item').remove();
        }
    });

    // Add Activity
    document.getElementById('add-activity').addEventListener('click', function() {
        const container = document.getElementById('activities-container');
        const div = document.createElement('div');
        div.className = 'activity-item mb-2';
        div.innerHTML = `
            <div class="row">
                <div class="col-md-10">
                    <input type="text" name="activities_list[]" class="form-control" placeholder="Activity item">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove-activity">Remove</button>
                </div>
            </div>
        `;
        container.appendChild(div);
    });

    // Remove Activity
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-activity')) {
            e.target.closest('.activity-item').remove();
        }
    });

    // Add Experience
    document.getElementById('add-experience').addEventListener('click', function() {
        const container = document.getElementById('experience-container');
        const div = document.createElement('div');
        div.className = 'experience-item mb-4 border p-3';
        div.innerHTML = `
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Position</label>
                        <input type="text" name="experience_timeline[${experienceIndex}][position]" class="form-control" 
                               placeholder="e.g., IT Consultant">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Company</label>
                        <input type="text" name="experience_timeline[${experienceIndex}][company]" class="form-control" 
                               placeholder="e.g., Webteck.Inc">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Period</label>
                        <input type="text" name="experience_timeline[${experienceIndex}][period]" class="form-control" 
                               placeholder="e.g., 2016 - Present">
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label>Order</label>
                        <input type="number" name="experience_timeline[${experienceIndex}][order]" class="form-control" 
                               value="${experienceIndex + 1}">
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-danger remove-experience">Remove Experience</button>
        `;
        container.appendChild(div);
        experienceIndex++;
    });

    // Remove Experience
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-experience')) {
            e.target.closest('.experience-item').remove();
        }
    });
});
</script>
