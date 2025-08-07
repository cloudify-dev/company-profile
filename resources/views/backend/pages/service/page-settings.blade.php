@extends('backend')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Service Page Settings</h6>
            <a href="{{ route('admin.service.index') }}" class="btn btn-secondary btn-sm">Back to Services</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.service.page-settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Breadcrumb Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="border-bottom pb-2 mb-3">Breadcrumb Section</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="breadcrumb_title" class="form-label">Breadcrumb Title</label>
                            <input type="text" class="form-control @error('breadcrumb_title') is-invalid @enderror" 
                                   id="breadcrumb_title" name="breadcrumb_title" 
                                   value="{{ old('breadcrumb_title', $servicePage->breadcrumb_title) }}" required>
                            @error('breadcrumb_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="breadcrumb_image" class="form-label">Breadcrumb Background Image</label>
                            <input type="file" class="form-control @error('breadcrumb_image') is-invalid @enderror" 
                                   id="breadcrumb_image" name="breadcrumb_image" accept="image/*">
                            @if($servicePage->breadcrumb_image)
                                <small class="text-muted">Current: {{ basename($servicePage->breadcrumb_image) }}</small>
                            @endif
                            @error('breadcrumb_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <!-- Service Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="border-bottom pb-2 mb-3">Service Section</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="service_section_subtitle" class="form-label">Section Subtitle</label>
                            <input type="text" class="form-control @error('service_section_subtitle') is-invalid @enderror" 
                                   id="service_section_subtitle" name="service_section_subtitle" 
                                   value="{{ old('service_section_subtitle', $servicePage->service_section_subtitle) }}" required>
                            @error('service_section_subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="service_section_title" class="form-label">Section Title</label>
                            <input type="text" class="form-control @error('service_section_title') is-invalid @enderror" 
                                   id="service_section_title" name="service_section_title" 
                                   value="{{ old('service_section_title', $servicePage->service_section_title) }}" required>
                            @error('service_section_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="service_section_description" class="form-label">Section Description</label>
                            <textarea class="form-control @error('service_section_description') is-invalid @enderror" 
                                      id="service_section_description" name="service_section_description" rows="3">{{ old('service_section_description', $servicePage->service_section_description) }}</textarea>
                            @error('service_section_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <!-- CTA Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="border-bottom pb-2 mb-3">Call to Action Section</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="cta_subtitle" class="form-label">CTA Subtitle</label>
                            <input type="text" class="form-control @error('cta_subtitle') is-invalid @enderror" 
                                   id="cta_subtitle" name="cta_subtitle" 
                                   value="{{ old('cta_subtitle', $servicePage->cta_subtitle) }}" required>
                            @error('cta_subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="cta_background_image" class="form-label">CTA Background Image</label>
                            <input type="file" class="form-control @error('cta_background_image') is-invalid @enderror" 
                                   id="cta_background_image" name="cta_background_image" accept="image/*">
                            @if($servicePage->cta_background_image)
                                <small class="text-muted">Current: {{ basename($servicePage->cta_background_image) }}</small>
                            @endif
                            @error('cta_background_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="cta_title_black" class="form-label">CTA Title (Black Part)</label>
                            <input type="text" class="form-control @error('cta_title_black') is-invalid @enderror" 
                                   id="cta_title_black" name="cta_title_black" 
                                   value="{{ old('cta_title_black', $servicePage->cta_title_black) }}" required>
                            @error('cta_title_black')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="cta_title_blue" class="form-label">CTA Title (Blue Part)</label>
                            <input type="text" class="form-control @error('cta_title_blue') is-invalid @enderror" 
                                   id="cta_title_blue" name="cta_title_blue" 
                                   value="{{ old('cta_title_blue', $servicePage->cta_title_blue) }}" required>
                            @error('cta_title_blue')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="cta_button_text" class="form-label">Button Text</label>
                            <input type="text" class="form-control @error('cta_button_text') is-invalid @enderror" 
                                   id="cta_button_text" name="cta_button_text" 
                                   value="{{ old('cta_button_text', $servicePage->cta_button_text) }}" required>
                            @error('cta_button_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="cta_button_link" class="form-label">Button Link</label>
                            <input type="text" class="form-control @error('cta_button_link') is-invalid @enderror" 
                                   id="cta_button_link" name="cta_button_link" 
                                   value="{{ old('cta_button_link', $servicePage->cta_button_link) }}" required>
                            @error('cta_button_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <!-- Process Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="border-bottom pb-2 mb-3">Work Process Section</h5>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="process_subtitle" class="form-label">Process Subtitle</label>
                            <input type="text" class="form-control @error('process_subtitle') is-invalid @enderror" 
                                   id="process_subtitle" name="process_subtitle" 
                                   value="{{ old('process_subtitle', $servicePage->process_subtitle) }}" required>
                            @error('process_subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="process_title_black" class="form-label">Process Title (Black Part)</label>
                            <input type="text" class="form-control @error('process_title_black') is-invalid @enderror" 
                                   id="process_title_black" name="process_title_black" 
                                   value="{{ old('process_title_black', $servicePage->process_title_black) }}" required>
                            @error('process_title_black')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="process_title_blue" class="form-label">Process Title (Blue Part)</label>
                            <input type="text" class="form-control @error('process_title_blue') is-invalid @enderror" 
                                   id="process_title_blue" name="process_title_blue" 
                                   value="{{ old('process_title_blue', $servicePage->process_title_blue) }}" required>
                            @error('process_title_blue')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <!-- Process Steps -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h6 class="mb-3">Process Steps</h6>
                        <div id="process-steps">
                            @php
                                $processSteps = old('process_steps', $servicePage->process_steps ?? $servicePage->getDefaultProcessSteps());
                            @endphp
                            @foreach($processSteps as $index => $step)
                                <div class="row mb-3 process-step" data-index="{{ $index }}">
                                    <div class="col-md-2">
                                        <label class="form-label">Step Number</label>
                                        <input type="text" class="form-control" name="process_steps[{{ $index }}][number]" 
                                               value="{{ $step['number'] ?? '' }}" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Step Title</label>
                                        <input type="text" class="form-control" name="process_steps[{{ $index }}][title]" 
                                               value="{{ $step['title'] ?? '' }}" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Icon File</label>
                                        <input type="text" class="form-control" name="process_steps[{{ $index }}][icon]" 
                                               value="{{ $step['icon'] ?? '' }}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Description</label>
                                        <input type="text" class="form-control" name="process_steps[{{ $index }}][description]" 
                                               value="{{ $step['description'] ?? '' }}" required>
                                    </div>
                                    <div class="col-md-1">
                                        <label class="form-label">&nbsp;</label>
                                        <button type="button" class="btn btn-danger btn-sm d-block remove-step">Remove</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-success btn-sm" id="add-step">Add Step</button>
                    </div>
                </div>
                
                <!-- Testimonial Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="border-bottom pb-2 mb-3">Testimonial Section</h5>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="testimonial_subtitle" class="form-label">Testimonial Subtitle</label>
                            <input type="text" class="form-control @error('testimonial_subtitle') is-invalid @enderror" 
                                   id="testimonial_subtitle" name="testimonial_subtitle" 
                                   value="{{ old('testimonial_subtitle', $servicePage->testimonial_subtitle) }}" required>
                            @error('testimonial_subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="testimonial_title_black" class="form-label">Testimonial Title (Black Part)</label>
                            <input type="text" class="form-control @error('testimonial_title_black') is-invalid @enderror" 
                                   id="testimonial_title_black" name="testimonial_title_black" 
                                   value="{{ old('testimonial_title_black', $servicePage->testimonial_title_black) }}" required>
                            @error('testimonial_title_black')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="testimonial_title_blue" class="form-label">Testimonial Title (Blue Part)</label>
                            <input type="text" class="form-control @error('testimonial_title_blue') is-invalid @enderror" 
                                   id="testimonial_title_blue" name="testimonial_title_blue" 
                                   value="{{ old('testimonial_title_blue', $servicePage->testimonial_title_blue) }}" required>
                            @error('testimonial_title_blue')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <!-- Settings -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1"
                                   {{ old('is_active', $servicePage->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active (Use these settings on frontend)
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.service.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Page Settings</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Add new process step
        document.getElementById('add-step').addEventListener('click', function() {
            const container = document.getElementById('process-steps');
            const index = container.children.length;
            const stepHtml = `
                <div class="row mb-3 process-step" data-index="${index}">
                    <div class="col-md-2">
                        <label class="form-label">Step Number</label>
                        <input type="text" class="form-control" name="process_steps[${index}][number]" value="${String(index + 1).padStart(2, '0')}" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Step Title</label>
                        <input type="text" class="form-control" name="process_steps[${index}][title]" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Icon File</label>
                        <input type="text" class="form-control" name="process_steps[${index}][icon]" placeholder="process_card_${index + 1}.svg" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control" name="process_steps[${index}][description]" required>
                    </div>
                    <div class="col-md-1">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-danger btn-sm d-block remove-step">Remove</button>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', stepHtml);
        });

        // Remove process step
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-step')) {
                e.target.closest('.process-step').remove();
                // Reindex remaining steps
                const steps = document.querySelectorAll('.process-step');
                steps.forEach((step, index) => {
                    step.setAttribute('data-index', index);
                    const inputs = step.querySelectorAll('input');
                    inputs.forEach(input => {
                        const name = input.getAttribute('name');
                        if (name) {
                            input.setAttribute('name', name.replace(/\[\d+\]/, `[${index}]`));
                        }
                    });
                });
            }
        });

        @if(session()->has('swal'))
            @php $swal = session('swal'); @endphp
            Swal.fire({
                title: '{{ $swal['title'] }}',
                text: '{{ $swal['text'] }}',
                icon: '{{ $swal['icon'] }}',
                timer: 3000
            });
        @endif
    </script>
@endsection
