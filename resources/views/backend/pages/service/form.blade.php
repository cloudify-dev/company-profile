@php $service = $service ?? null; @endphp

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
    <div class="col-md-8">
        <!-- Basic Information -->
        <div class="card">
            <div class="card-header">
                <h5>Basic Information</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $service->title ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="4" required>{{ old('description', $service->description ?? '') }}</textarea>
                </div>
                <div class="form-group">
                    <label>Additional Description</label>
                    <textarea name="additional_description" class="form-control" rows="3">{{ old('additional_description', $service->additional_description ?? '') }}</textarea>
                    <small class="form-text text-muted">This will appear after the main content section.</small>
                </div>
            </div>
        </div>

        <!-- Content Sections -->
        <div class="card">
            <div class="card-header">
                <h5>Content Sections</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Section Title</label>
                    <input type="text" name="section_title" class="form-control" value="{{ old('section_title', $service->section_title ?? 'We Serve The Best Work') }}">
                </div>
                
                <div class="form-group">
                    <label>Benefits Section Title</label>
                    <input type="text" name="benefits_title" class="form-control" value="{{ old('benefits_title', $service->benefits_title ?? 'Benefits With Our Service') }}">
                </div>
                
                <div class="form-group">
                    <label>FAQ Section Title</label>
                    <input type="text" name="faqs_title" class="form-control" value="{{ old('faqs_title', $service->faqs_title ?? 'Questions About Service') }}">
                </div>
                
                <div class="form-group">
                    <label>Checklist Items</label>
                    <div id="checklist-items">
                        @php
                            $checklistItems = old('checklist_items', $service->checklist_items ?? [
                                'Up am intention on dependent questions',
                                'Surrounded affronting favourable',
                                'Sed ut perspiciatis unde omnis iste natus',
                                'Special Careness Risk Free',
                                'Bibend auctor nisi elit volume are beguiled'
                            ]);
                        @endphp
                        @foreach($checklistItems as $index => $item)
                            <div class="input-group mb-2 checklist-item">
                                <input type="text" name="checklist_items[]" class="form-control" value="{{ $item }}">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-danger remove-checklist-item">Remove</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-secondary" id="add-checklist-item">Add Item</button>
                </div>
            </div>
        </div>

        <!-- Service Benefits -->
        <div class="card">
            <div class="card-header">
                <h5>Service Benefits</h5>
            </div>
            <div class="card-body">
                <div id="service-benefits">
                    @php
                        $benefits = old('benefits', $service->benefits ?? []);
                        if(empty($benefits) && !old('benefits')) {
                            $benefits = [
                                ['title' => 'Flexible Solutions', 'description' => 'Completely grow multimedia based content before global scenarios.', 'icon' => ''],
                                ['title' => '24/7 Unlimited Support', 'description' => 'Completely grow multimedia based content before global scenarios.', 'icon' => '']
                            ];
                        }
                    @endphp
                    @foreach($benefits as $index => $benefit)
                        <div class="card mb-3 benefit-item">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Benefit Title</label>
                                            <input type="text" name="benefits[{{ $index }}][title]" class="form-control" 
                                                value="{{ is_object($benefit) ? $benefit->title : ($benefit['title'] ?? '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Icon (Optional)</label>
                                            <input type="file" name="benefits[{{ $index }}][icon_file]" class="form-control" accept="image/*">
                                            @if(is_object($benefit) && $benefit->icon)
                                                <img src="{{ asset('storage/' . $benefit->icon) }}" width="30" class="mt-2">
                                                <input type="hidden" name="benefits[{{ $index }}][icon]" value="{{ $benefit->icon }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Benefit Description</label>
                                    <textarea name="benefits[{{ $index }}][description]" class="form-control" rows="3">{{ is_object($benefit) ? $benefit->description : ($benefit['description'] ?? '') }}</textarea>
                                </div>
                                <button type="button" class="btn btn-danger btn-sm remove-benefit">Remove Benefit</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-secondary" id="add-benefit">Add Benefit</button>
            </div>
        </div>

        <!-- Service FAQs -->
        <div class="card">
            <div class="card-header">
                <h5>Frequently Asked Questions</h5>
            </div>
            <div class="card-body">
                <div id="service-faqs">
                    @php
                        $faqs = old('faqs', $service->faqs ?? []);
                        if(empty($faqs) && !old('faqs')) {
                            $faqs = [
                                ['question' => 'Where can I get analytics help?', 'answer' => 'Synergistically evisculate ubiquitous niches whereas holistic resources. Assertively evolve prospective methods of empowerment before diverse web-readiness.'],
                                ['question' => 'How long should a business plan be?', 'answer' => 'Synergistically evisculate ubiquitous niches whereas holistic resources. Assertively evolve prospective methods of empowerment before diverse web-readiness.']
                            ];
                        }
                    @endphp
                    @foreach($faqs as $index => $faq)
                        <div class="card mb-3 faq-item">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Question</label>
                                    <input type="text" name="faqs[{{ $index }}][question]" class="form-control" 
                                        value="{{ is_object($faq) ? $faq->question : ($faq['question'] ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label>Answer</label>
                                    <textarea name="faqs[{{ $index }}][answer]" class="form-control" rows="4">{{ is_object($faq) ? $faq->answer : ($faq['answer'] ?? '') }}</textarea>
                                </div>
                                <button type="button" class="btn btn-danger btn-sm remove-faq">Remove FAQ</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-secondary" id="add-faq">Add FAQ</button>
            </div>
        </div>

        <!-- Video Section -->
        <div class="card">
            <div class="card-header">
                <h5>Video Section</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Video URL</label>
                    <input type="url" name="video_url" class="form-control" value="{{ old('video_url', $service->video_url ?? '') }}">
                    <small class="form-text text-muted">YouTube or other video platform URL</small>
                </div>
                <div class="form-group">
                    <label>Video Thumbnail</label>
                    <input type="file" name="video_thumbnail" class="form-control">
                    @if (!empty($service->video_thumbnail))
                        <img src="{{ asset('storage/' . $service->video_thumbnail) }}" width="100" class="mt-2">
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <!-- Images -->
        <div class="card">
            <div class="card-header">
                <h5>Images</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Main Image</label>
                    <input type="file" name="image" class="form-control">
                    @if (!empty($service->image))
                        <img src="{{ asset('storage/' . $service->image) }}" width="100" class="mt-2">
                    @endif
                </div>
            </div>
        </div>

        <!-- Sidebar Settings -->
        <div class="card">
            <div class="card-header">
                <h5>Sidebar Settings</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <strong>Note:</strong> The sidebar automatically displays all services from the database.
                </div>
                <div class="form-group">
                    <label>Sidebar Title</label>
                    <input type="text" name="sidebar_title" class="form-control" value="{{ old('sidebar_title', $service->sidebar_title ?? 'All Services') }}">
                    <small class="form-text text-muted">Title for the services list in sidebar (default: "All Services")</small>
                </div>
            </div>
        </div>

        <!-- Downloads -->
        <div class="card">
            <div class="card-header">
                <h5>Downloads</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Brochure PDF</label>
                    <input type="file" name="brochure_pdf" class="form-control" accept=".pdf">
                    @if (!empty($service->brochure_pdf))
                        <a href="{{ asset('storage/' . $service->brochure_pdf) }}" target="_blank" class="mt-2 d-block">View Current PDF</a>
                    @endif
                </div>
                <div class="form-group">
                    <label>Brochure DOC</label>
                    <input type="file" name="brochure_doc" class="form-control" accept=".doc,.docx">
                    @if (!empty($service->brochure_doc))
                        <a href="{{ asset('storage/' . $service->brochure_doc) }}" target="_blank" class="mt-2 d-block">View Current DOC</a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Contact Widget -->
        <div class="card">
            <div class="card-header">
                <h5>Contact Widget</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Widget Text</label>
                    <input type="text" name="contact_widget_text" class="form-control" value="{{ old('contact_widget_text', $service->contact_widget_text ?? 'CONTACT US NOW') }}">
                </div>
                <div class="form-group">
                    <label>Widget Title</label>
                    <input type="text" name="contact_widget_title" class="form-control" value="{{ old('contact_widget_title', $service->contact_widget_title ?? 'You Need Help?') }}">
                </div>
                <div class="form-group">
                    <label>Button Text</label>
                    <input type="text" name="contact_widget_button_text" class="form-control" value="{{ old('contact_widget_button_text', $service->contact_widget_button_text ?? 'GET A QUOTE') }}">
                </div>
                <div class="form-group">
                    <label>Button Link</label>
                    <input type="text" name="contact_widget_button_link" class="form-control" value="{{ old('contact_widget_button_link', $service->contact_widget_button_link ?? '/contact') }}">
                </div>
                <div class="form-group">
                    <label>Background Image</label>
                    <input type="file" name="contact_widget_background" class="form-control">
                    @if (!empty($service->contact_widget_background))
                        <img src="{{ asset('storage/' . $service->contact_widget_background) }}" width="100" class="mt-2">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Checklist items management
    document.getElementById('add-checklist-item').addEventListener('click', function() {
        const checklistContainer = document.getElementById('checklist-items');
        const newItem = document.createElement('div');
        newItem.className = 'input-group mb-2 checklist-item';
        newItem.innerHTML = `
            <input type="text" name="checklist_items[]" class="form-control" placeholder="Enter checklist item">
            <div class="input-group-append">
                <button type="button" class="btn btn-danger remove-checklist-item">Remove</button>
            </div>
        `;
        checklistContainer.appendChild(newItem);
    });
    
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-checklist-item')) {
            e.target.closest('.checklist-item').remove();
        }
    });

    // Benefits management
    let benefitIndex = document.querySelectorAll('.benefit-item').length;
    
    document.getElementById('add-benefit').addEventListener('click', function() {
        const benefitsContainer = document.getElementById('service-benefits');
        const newBenefit = document.createElement('div');
        newBenefit.className = 'card mb-3 benefit-item';
        newBenefit.innerHTML = `
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Benefit Title</label>
                            <input type="text" name="benefits[${benefitIndex}][title]" class="form-control" placeholder="Enter benefit title">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Icon (Optional)</label>
                            <input type="file" name="benefits[${benefitIndex}][icon_file]" class="form-control" accept="image/*">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Benefit Description</label>
                    <textarea name="benefits[${benefitIndex}][description]" class="form-control" rows="3" placeholder="Enter benefit description"></textarea>
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-benefit">Remove Benefit</button>
            </div>
        `;
        benefitsContainer.appendChild(newBenefit);
        benefitIndex++;
    });
    
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-benefit')) {
            e.target.closest('.benefit-item').remove();
        }
    });

    // FAQs management
    let faqIndex = document.querySelectorAll('.faq-item').length;
    
    document.getElementById('add-faq').addEventListener('click', function() {
        const faqsContainer = document.getElementById('service-faqs');
        const newFaq = document.createElement('div');
        newFaq.className = 'card mb-3 faq-item';
        newFaq.innerHTML = `
            <div class="card-body">
                <div class="form-group">
                    <label>Question</label>
                    <input type="text" name="faqs[${faqIndex}][question]" class="form-control" placeholder="Enter question">
                </div>
                <div class="form-group">
                    <label>Answer</label>
                    <textarea name="faqs[${faqIndex}][answer]" class="form-control" rows="4" placeholder="Enter answer"></textarea>
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-faq">Remove FAQ</button>
            </div>
        `;
        faqsContainer.appendChild(newFaq);
        faqIndex++;
    });
    
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-faq')) {
            e.target.closest('.faq-item').remove();
        }
    });
});
</script>
