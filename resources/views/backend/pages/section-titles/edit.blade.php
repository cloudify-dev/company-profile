@extends('backend')
@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="mb-0">Edit Section Title</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.section-titles.update', $sectionTitle->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="section_name" class="form-label">Section Name</label>
                    <select class="form-control @error('section_name') is-invalid @enderror" id="section_name" name="section_name" required>
                        <option value="">Select Section</option>
                        <option value="team" {{ old('section_name', $sectionTitle->section_name) == 'team' ? 'selected' : '' }}>Team</option>
                        <option value="testimonial" {{ old('section_name', $sectionTitle->section_name) == 'testimonial' ? 'selected' : '' }}>Testimonial</option>
                        <option value="service" {{ old('section_name', $sectionTitle->section_name) == 'service' ? 'selected' : '' }}>Service</option>
                        <option value="project" {{ old('section_name', $sectionTitle->section_name) == 'project' ? 'selected' : '' }}>Project</option>
                        <option value="blog" {{ old('section_name', $sectionTitle->section_name) == 'blog' ? 'selected' : '' }}>Blog</option>
                        <option value="about" {{ old('section_name', $sectionTitle->section_name) == 'about' ? 'selected' : '' }}>About</option>
                    </select>
                    @error('section_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Choose the section where this title will be displayed</small>
                </div>

                <div class="mb-3">
                    <label for="subtitle" class="form-label">Subtitle</label>
                    <input type="text" class="form-control @error('subtitle') is-invalid @enderror" 
                           id="subtitle" name="subtitle" value="{{ old('subtitle', $sectionTitle->subtitle) }}" required
                           placeholder="e.g., TEAM MEMBER, CUSTOMER FEEDBACK">
                    @error('subtitle')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="title_black" class="form-label">Title (Black Part)</label>
                    <input type="text" class="form-control @error('title_black') is-invalid @enderror" 
                           id="title_black" name="title_black" value="{{ old('title_black', $sectionTitle->title_black) }}" required
                           placeholder="e.g., See Our Skilled Expert, What Happy Clients Says">
                    @error('title_black')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="title_blue" class="form-label">Title (Blue Part)</label>
                    <input type="text" class="form-control @error('title_blue') is-invalid @enderror" 
                           id="title_blue" name="title_blue" value="{{ old('title_blue', $sectionTitle->title_blue) }}" required
                           placeholder="e.g., Team, About Us?">
                    @error('title_blue')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description (Optional)</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" name="description" rows="3">{{ old('description', $sectionTitle->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" 
                               {{ old('is_active', $sectionTitle->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.section-titles.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Section Title</button>
                </div>
            </form>
        </div>
    </div>
@endsection
