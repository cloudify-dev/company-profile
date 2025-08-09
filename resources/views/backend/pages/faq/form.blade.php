@php $faq = $faq ?? null; @endphp

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
        <h5>FAQ Information</h5>
    </div>
    <div class="card-body pt-0">
        <div class="form-group mb-3">
            <label for="question" class="form-label">Question <span class="text-danger">*</span></label>
            <input type="text" 
                   name="question" 
                   id="question"
                   class="form-control @error('question') is-invalid @enderror" 
                   value="{{ old('question', $faq->question ?? '') }}"
                   placeholder="Enter the frequently asked question">
            @error('question')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="answer" class="form-label">Answer <span class="text-danger">*</span></label>
            <textarea name="answer" 
                      id="answer"
                      class="form-control @error('answer') is-invalid @enderror" 
                      rows="6"
                      placeholder="Enter the detailed answer to the question">{{ old('answer', $faq->answer ?? '') }}</textarea>
            @error('answer')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="text-muted">You can use basic HTML tags for formatting if needed.</small>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                    <select name="category" 
                            id="category"
                            class="form-select @error('category') is-invalid @enderror">
                        <option value="">Select Category</option>
                        <option value="general" {{ old('category', $faq->category ?? '') === 'general' ? 'selected' : '' }}>
                            General
                        </option>
                        <option value="services" {{ old('category', $faq->category ?? '') === 'services' ? 'selected' : '' }}>
                            Services
                        </option>
                        <option value="pricing" {{ old('category', $faq->category ?? '') === 'pricing' ? 'selected' : '' }}>
                            Pricing
                        </option>
                        <option value="technical" {{ old('category', $faq->category ?? '') === 'technical' ? 'selected' : '' }}>
                            Technical
                        </option>
                        <option value="support" {{ old('category', $faq->category ?? '') === 'support' ? 'selected' : '' }}>
                            Support
                        </option>
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="order" class="form-label">Display Order</label>
                    <input type="number" 
                           name="order" 
                           id="order"
                           class="form-control @error('order') is-invalid @enderror" 
                           value="{{ old('order', $faq->order ?? 0) }}"
                           min="0"
                           placeholder="0">
                    @error('order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Lower numbers appear first. Use 0 for default ordering.</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Settings Section -->
<div class="card mb-4">
    <div class="card-header">
        <h5>Settings</h5>
    </div>
    <div class="card-body pt-0">
        <div class="form-check form-switch">
            <input class="form-check-input" 
                   type="checkbox" 
                   name="is_active" 
                   id="is_active"
                   {{ old('is_active', $faq->is_active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">
                Active Status
            </label>
        </div>
    </div>
</div>

<!-- Category Preview -->
<div class="card mb-4">
    <div class="card-header">
        <h5>Preview</h5>
    </div>
    <div class="card-body pt-0">
        <div class="border p-3 rounded bg-light">
            <div class="d-flex align-items-center gap-2 mb-2">
                <span id="categoryPreview" class="badge bg-primary">General</span>
                <span class="badge bg-light text-dark" id="orderPreview">0</span>
            </div>
            <h6 id="questionPreview" class="mb-2">Your question will appear here...</h6>
            <p id="answerPreview" class="text-muted mb-0 small">Your answer will appear here...</p>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const questionInput = document.getElementById('question');
    const answerInput = document.getElementById('answer');
    const categorySelect = document.getElementById('category');
    const orderInput = document.getElementById('order');
    
    const questionPreview = document.getElementById('questionPreview');
    const answerPreview = document.getElementById('answerPreview');
    const categoryPreview = document.getElementById('categoryPreview');
    const orderPreview = document.getElementById('orderPreview');
    
    const categoryBadges = {
        'general': 'bg-primary',
        'services': 'bg-success',
        'pricing': 'bg-warning',
        'technical': 'bg-info',
        'support': 'bg-secondary'
    };
    
    function updatePreview() {
        // Update question preview
        const question = questionInput.value || 'Your question will appear here...';
        questionPreview.textContent = question;
        
        // Update answer preview
        const answer = answerInput.value || 'Your answer will appear here...';
        answerPreview.textContent = answer.length > 100 ? answer.substring(0, 100) + '...' : answer;
        
        // Update category preview
        const category = categorySelect.value || 'general';
        const categoryLabel = categorySelect.options[categorySelect.selectedIndex].text || 'General';
        categoryPreview.className = `badge ${categoryBadges[category] || 'bg-primary'}`;
        categoryPreview.textContent = categoryLabel;
        
        // Update order preview
        const order = orderInput.value || '0';
        orderPreview.textContent = order;
    }
    
    // Initial preview update
    updatePreview();
    
    // Add event listeners
    questionInput.addEventListener('input', updatePreview);
    answerInput.addEventListener('input', updatePreview);
    categorySelect.addEventListener('change', updatePreview);
    orderInput.addEventListener('input', updatePreview);
});
</script>