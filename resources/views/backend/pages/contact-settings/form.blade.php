@php $contactSetting = $contactSetting ?? null; @endphp

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
    <div class="col-12">
        <div class="card shadow-sm mb-4">
            <div class="card-header">
                <h5 class="mb-0">Contact Information</h5>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                    id="title" name="title" 
                                    value="{{ old('title', $contactSetting->title ?? 'Have Any Questions?') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="contact_action_type" class="form-label">Contact Action Type <span class="text-danger">*</span></label>
                            <select class="form-select @error('contact_action_type') is-invalid @enderror" 
                                    id="contact_action_type" name="contact_action_type" required>
                                <option value="email" {{ old('contact_action_type', $contactSetting->contact_action_type ?? 'email') == 'email' ? 'selected' : '' }}>Email</option>
                                <option value="whatsapp" {{ old('contact_action_type', $contactSetting->contact_action_type ?? '') == 'whatsapp' ? 'selected' : '' }}>WhatsApp</option>
                            </select>
                            @error('contact_action_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="contact_action_value" class="form-label">Contact Action Value</label>
                            <input type="text" class="form-control @error('contact_action_value') is-invalid @enderror" 
                                    id="contact_action_value" name="contact_action_value" 
                                    value="{{ old('contact_action_value', $contactSetting->contact_action_value ?? '') }}"
                                    placeholder="Email address or WhatsApp number">
                            @error('contact_action_value')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">For email: your@email.com | For WhatsApp: +1234567890</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" 
                                        id="is_active" name="is_active" value="1"
                                        {{ old('is_active', $contactSetting->is_active ?? true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Active
                                </label>
                            </div>
                            <span class="form-text">Enabling this will automatically deactivate other active records, as only one record can be active at a time</span>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="subtitle" class="form-label">Subtitle</label>
                    <textarea class="form-control @error('subtitle') is-invalid @enderror" 
                                id="subtitle" name="subtitle" rows="3">{{ old('subtitle', $contactSetting->subtitle ?? '') }}</textarea>
                    @error('subtitle')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Addresses Section -->
                <div class="mb-4">
                    <label class="form-label">Addresses</label>
                    <div id="addresses-container">
                        @php
                            $addresses = old('addresses', $contactSetting->addresses ?? []);
                            if (empty($addresses)) $addresses = [''];
                        @endphp
                        @foreach($addresses as $index => $address)
                            <div class="address-item mb-2" data-index="{{ $index }}">
                                <div class="input-group">
                                    <input type="text" class="form-control" 
                                            name="addresses[]" value="{{ $address }}"
                                            placeholder="Enter address">
                                    <button type="button" class="btn btn-outline-success add-address mb-0">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger remove-address mb-0">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Phones Section -->
                <div class="mb-4">
                    <label class="form-label">Phone Numbers</label>
                    <div id="phones-container">
                        @php
                            $phones = old('phones', $contactSetting->phones ?? []);
                            if (empty($phones)) $phones = [''];
                        @endphp
                        @foreach($phones as $index => $phone)
                            <div class="phone-item mb-2" data-index="{{ $index }}">
                                <div class="input-group">
                                    <input type="text" class="form-control" 
                                            name="phones[]" value="{{ $phone }}"
                                            placeholder="Enter phone number">
                                    <button type="button" class="btn btn-outline-success add-phone mb-0">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger remove-phone mb-0">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Emails Section -->
                <div class="mb-4">
                    <label class="form-label">Email Addresses</label>
                    <div id="emails-container">
                        @php
                            $emails = old('emails', $contactSetting->emails ?? []);
                            if (empty($emails)) $emails = [''];
                        @endphp
                        @foreach($emails as $index => $email)
                            <div class="email-item mb-2" data-index="{{ $index }}">
                                <div class="input-group">
                                    <input type="email" class="form-control" 
                                            name="emails[]" value="{{ $email }}"
                                            placeholder="Enter email address">
                                    <button type="button" class="btn btn-outline-success add-email mb-0">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger remove-email mb-0">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-3">
                    <label for="map_embed_url" class="form-label">Map Embed URL</label>
                    <input type="url" class="form-control @error('map_embed_url') is-invalid @enderror" 
                            id="map_embed_url" name="map_embed_url" 
                            value="{{ old('map_embed_url', $contactSetting->map_embed_url ?? '') }}"
                            placeholder="https://www.google.com/maps/embed?pb=...">
                    @error('map_embed_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Get embed URL from Google Maps</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add/Remove functionality for addresses
    document.addEventListener('click', function(e) {
        if (e.target.closest('.add-address')) {
            let container = document.getElementById('addresses-container');
            let newItem = container.lastElementChild.cloneNode(true);
            newItem.querySelector('input').value = '';
            container.appendChild(newItem);
        }
        
        if (e.target.closest('.remove-address')) {
            let items = document.querySelectorAll('.address-item');
            if (items.length > 1) {
                e.target.closest('.address-item').remove();
            }
        }

        // Add/Remove functionality for phones
        if (e.target.closest('.add-phone')) {
            let container = document.getElementById('phones-container');
            let newItem = container.lastElementChild.cloneNode(true);
            newItem.querySelector('input').value = '';
            container.appendChild(newItem);
        }
        
        if (e.target.closest('.remove-phone')) {
            let items = document.querySelectorAll('.phone-item');
            if (items.length > 1) {
                e.target.closest('.phone-item').remove();
            }
        }

        // Add/Remove functionality for emails
        if (e.target.closest('.add-email')) {
            let container = document.getElementById('emails-container');
            let newItem = container.lastElementChild.cloneNode(true);
            newItem.querySelector('input').value = '';
            container.appendChild(newItem);
        }
        
        if (e.target.closest('.remove-email')) {
            let items = document.querySelectorAll('.email-item');
            if (items.length > 1) {
                e.target.closest('.email-item').remove();
            }
        }
    });
});
</script>
