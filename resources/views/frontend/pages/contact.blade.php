@extends('frontend2')

@section('content')
    @include('frontend.partials.breadcrumb', [
        'title' => 'Contact',
        'bgImage' => !empty($pageSettings?->breadcrumb_image)
            ? 'storage/' . $pageSettings->breadcrumb_image
            : 'assets_frontend/assets/img/bg/breadcumb-bg.jpg',
        'breadcrumb' => [['label' => 'Contact Us']],
    ])

    <!-- Contact Info Section -->
    <div class="space">
        <div class="container">
            <div class="row gy-4">
                @if($contactSetting && $contactSetting->addresses && count($contactSetting->addresses) > 0)
                    <div class="col-xl-4 col-md-6">
                        <div class="contact-info">
                            <div class="contact-info_icon">
                                <i class="fas fa-location-dot"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="box-title">Our Office Address</h4>
                                <span class="contact-info_text">
                                    @foreach($contactSetting->addresses as $address)
                                        {{ $address }}@if(!$loop->last)<br>@endif
                                    @endforeach
                                </span>
                            </div>
                        </div>
                    </div>
                @endif

                @if($contactSetting && $contactSetting->phones && count($contactSetting->phones) > 0)
                    <div class="col-xl-4 col-md-6">
                        <div class="contact-info">
                            <div class="contact-info_icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="box-title">Call Us Anytime</h4>
                                <span class="contact-info_text">
                                    @foreach($contactSetting->phones as $phone)
                                        <a href="tel:{{ $phone }}">{{ $phone }}</a>
                                    @endforeach
                                </span>
                            </div>
                        </div>
                    </div>
                @endif

                @if($contactSetting && $contactSetting->emails && count($contactSetting->emails) > 0)
                    <div class="col-xl-4 col-md-6">
                        <div class="contact-info">
                            <div class="contact-info_icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="box-title">Send An Email</h4>
                                <span class="contact-info_text">
                                    @foreach($contactSetting->emails as $email)
                                        <a href="mailto:{{ $email }}">{{ $email }}</a>
                                    @endforeach
                                </span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="bg-smoke space" data-bg-src="{{ asset('assets_frontend/assets/img/bg/contact_bg_1.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="title-area mb-35 text-xl-start text-center">
                        <span class="sub-title">
                            <div class="icon-masking me-2">
                                <span class="mask-icon" data-mask-src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_2.svg') }}"></span>
                                <img src="{{ asset('assets_frontend/assets/img/theme-img/title_shape_2.svg') }}" alt="shape">
                            </div>contact with us!
                        </span>
                        <h2 class="sec-title">{{ $contactSetting->title ?? 'Have Any Questions?' }}</h2>
                        <p class="sec-text">{{ $contactSetting->subtitle ?? 'Enthusiastically disintermediate one-to-one leadership via business e-commerce. Dramatically reintermediate compelling process improvements rather than empowered relationships.' }}</p>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form class="contact-form" id="contactForm">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                        name="name" id="name" placeholder="Your Name" 
                                        value="{{ old('name') }}" required>
                                <i class="fal fa-user"></i>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                        name="email" id="email" placeholder="Email Address" 
                                        value="{{ old('email') }}" required>
                                <i class="fal fa-envelope"></i>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <select name="subject" id="subject" class="form-select @error('subject') is-invalid @enderror" required>
                                    <option value="" disabled selected hidden>Select Subject</option>
                                    <option value="Web Development" {{ old('subject') == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                                    <option value="Brand Marketing" {{ old('subject') == 'Brand Marketing' ? 'selected' : '' }}>Brand Marketing</option>
                                    <option value="UI/UX Designing" {{ old('subject') == 'UI/UX Designing' ? 'selected' : '' }}>UI/UX Designing</option>
                                    <option value="Digital Marketing" {{ old('subject') == 'Digital Marketing' ? 'selected' : '' }}>Digital Marketing</option>
                                </select>
                                <i class="fal fa-chevron-down"></i>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="tel" class="form-control @error('number') is-invalid @enderror" 
                                        name="number" id="number" placeholder="Phone Number" 
                                        value="{{ old('number') }}">
                                <i class="fal fa-phone"></i>
                                @error('number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <textarea name="message" id="message" cols="30" rows="3" 
                                            class="form-control @error('message') is-invalid @enderror" 
                                            placeholder="Your Message" required>{{ old('message') }}</textarea>
                                <i class="fal fa-comment"></i>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-btn text-xl-start text-center col-12">
                                @if($contactSetting && $contactSetting->contact_action_type === 'whatsapp')
                                    <button type="button" onclick="sendWhatsApp()" class="th-btn">
                                        Send via WhatsApp<i class="fab fa-whatsapp ms-2"></i>
                                    </button>
                                @else
                                    <button type="button" onclick="sendEmail()" class="th-btn">
                                        Send Message<i class="fa-regular fa-arrow-right ms-2"></i>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    @if($contactSetting && $contactSetting->map_embed_url)
        <div class="map-sec">
            <iframe src="{{ $contactSetting->map_embed_url }}" 
                    allowfullscreen="" 
                    loading="lazy"
                    style="border:0; width: 100%; height: 450px;">
            </iframe>
        </div>
    @endif

    <script>
        function sendEmail() {
            const form = document.getElementById('contactForm');
            const name = form.name.value;
            const email = form.email.value;
            const subject = form.subject.value;
            const number = form.number.value;
            const message = form.message.value;

            if (!name || !email || !subject || !message) {
                alert('Please fill in all required fields');
                return;
            }

            const emailBody = `Name: ${name}\nEmail: ${email}\nPhone: ${number || 'Not provided'}\nSubject: ${subject}\n\nMessage:\n${message}`;
            const emailTo = '{{ $contactSetting->contact_action_value ?? "info@example.com" }}';
            const mailtoLink = `mailto:${emailTo}?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(emailBody)}`;
            
            window.location.href = mailtoLink;
        }

        function sendWhatsApp() {
            const form = document.getElementById('contactForm');
            const name = form.name.value;
            const email = form.email.value;
            const subject = form.subject.value;
            const number = form.number.value;
            const message = form.message.value;

            if (!name || !email || !subject || !message) {
                alert('Please fill in all required fields');
                return;
            }

            const whatsappMessage = `*Contact Form Submission*\n\n*Name:* ${name}\n*Email:* ${email}\n*Phone:* ${number || 'Not provided'}\n*Subject:* ${subject}\n\n*Message:*\n${message}`;
            const whatsappNumber = '{{ str_replace(["+", " ", "-"], "", $contactSetting->contact_action_value ?? "") }}';
            const whatsappLink = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(whatsappMessage)}`;
            
            window.open(whatsappLink, '_blank');
        }
    </script>

@endsection