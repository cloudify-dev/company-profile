@extends('frontend2')

@section('content')
    @include('frontend.partials.breadcrumb', [
        'title' => 'Frequently Asked Questions',
        'bgImage' => !empty($pageSettings?->breadcrumb_image)
            ? 'storage/' . $pageSettings->breadcrumb_image
            : 'assets_frontend/assets/img/bg/breadcumb-bg.jpg',
        'breadcrumb' => [['label' => 'FAQ']],
    ])

    <section class="space">
        <div class="container">
            <!-- Filter Section -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="bg-light p-4 rounded shadow-sm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" id="faqSearch" class="form-control" placeholder="Search FAQ...">
                            </div>
                            <div class="col-md-4">
                                <select id="faqCategory" class="form-select">
                                    <option value="">All Categories</option>
                                    <option value="general">General</option>
                                    <option value="services">Services</option>
                                    <option value="pricing">Pricing</option>
                                    <option value="technical">Technical</option>
                                    <option value="support">Support</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button id="clearFilter" class="th-btn w-100">Clear</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Categories -->
            <div class="row">
                <div class="col-12">
                    <div class="title-area text-center">
                        <span class="sub-title">Help Center</span>
                        <h2 class="sec-title">Frequently Asked Questions</h2>
                        <p class="text-center">Find answers to common questions about our services and how we work.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Accordion -->
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="faqAccordion">
                        
                        <!-- General FAQ -->
                        <div class="faq-item" data-category="general">
                            <div class="accordion-item mb-3 rounded overflow-hidden shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                        <span class="badge bg-primary me-3">General</span>
                                        What services do you provide?
                                    </button>
                                </h2>
                                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        We provide comprehensive web development services including custom website development, e-commerce solutions, mobile applications, enterprise software, and digital transformation consulting. Our team specializes in modern technologies like Laravel, React, Vue.js, and cloud deployment.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item" data-category="general">
                            <div class="accordion-item mb-3 rounded overflow-hidden shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                        <span class="badge bg-primary me-3">General</span>
                                        How long have you been in business?
                                    </button>
                                </h2>
                                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        We have been providing professional web development services for over 5 years. Our experienced team has successfully delivered 100+ projects across various industries including healthcare, fintech, e-commerce, and education.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Services FAQ -->
                        <div class="faq-item" data-category="services">
                            <div class="accordion-item mb-3 rounded overflow-hidden shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                        <span class="badge bg-success me-3">Services</span>
                                        Do you provide custom web development?
                                    </button>
                                </h2>
                                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Yes, we specialize in custom web development tailored to your specific business needs. We build scalable, secure, and performance-optimized solutions using the latest technologies and best practices.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item" data-category="services">
                            <div class="accordion-item mb-3 rounded overflow-hidden shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                        <span class="badge bg-success me-3">Services</span>
                                        Can you help with mobile app development?
                                    </button>
                                </h2>
                                <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Absolutely! We develop both native and cross-platform mobile applications for iOS and Android. Our team uses React Native, Flutter, and native development approaches based on your project requirements.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pricing FAQ -->
                        <div class="faq-item" data-category="pricing">
                            <div class="accordion-item mb-3 rounded overflow-hidden shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                        <span class="badge bg-warning text-dark me-3">Pricing</span>
                                        How do you price your projects?
                                    </button>
                                </h2>
                                <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Our pricing is based on project scope, complexity, timeline, and technology requirements. We offer both fixed-price and hourly rate models. After understanding your requirements, we provide a detailed proposal with transparent pricing breakdown.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item" data-category="pricing">
                            <div class="accordion-item mb-3 rounded overflow-hidden shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                        <span class="badge bg-warning text-dark me-3">Pricing</span>
                                        Do you offer payment plans?
                                    </button>
                                </h2>
                                <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Yes, we offer flexible payment plans to accommodate different budget requirements. Typically, we structure payments in milestones: 30% upfront, 40% at development milestone, and 30% upon completion. Custom payment schedules can be discussed.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Technical FAQ -->
                        <div class="faq-item" data-category="technical">
                            <div class="accordion-item mb-3 rounded overflow-hidden shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                                        <span class="badge bg-info me-3">Technical</span>
                                        What technologies do you use?
                                    </button>
                                </h2>
                                <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        We use modern, industry-standard technologies including:
                                        <ul class="mt-2">
                                            <li><strong>Backend:</strong> PHP (Laravel), Node.js, Python</li>
                                            <li><strong>Frontend:</strong> React, Vue.js, Angular, HTML5/CSS3</li>
                                            <li><strong>Mobile:</strong> React Native, Flutter</li>
                                            <li><strong>Database:</strong> MySQL, PostgreSQL, MongoDB</li>
                                            <li><strong>Cloud:</strong> AWS, Google Cloud, Azure</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item" data-category="technical">
                            <div class="accordion-item mb-3 rounded overflow-hidden shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">
                                        <span class="badge bg-info me-3">Technical</span>
                                        Do you provide hosting and maintenance?
                                    </button>
                                </h2>
                                <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Yes, we provide comprehensive hosting solutions and ongoing maintenance services. Our hosting packages include SSL certificates, regular backups, security monitoring, and performance optimization. Maintenance includes updates, bug fixes, and feature enhancements.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Support FAQ -->
                        <div class="faq-item" data-category="support">
                            <div class="accordion-item mb-3 rounded overflow-hidden shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq9">
                                        <span class="badge bg-secondary me-3">Support</span>
                                        What kind of support do you provide?
                                    </button>
                                </h2>
                                <div id="faq9" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        We provide comprehensive support including:
                                        <ul class="mt-2">
                                            <li>24/7 technical support for critical issues</li>
                                            <li>Regular maintenance and updates</li>
                                            <li>Performance monitoring and optimization</li>
                                            <li>Security updates and patches</li>
                                            <li>User training and documentation</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item" data-category="support">
                            <div class="accordion-item mb-3 rounded overflow-hidden shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq10">
                                        <span class="badge bg-secondary me-3">Support</span>
                                        How can I contact support?
                                    </button>
                                </h2>
                                <div id="faq10" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        You can reach our support team through multiple channels:
                                        <ul class="mt-2">
                                            <li><strong>Email:</strong> support@cloudify.id</li>
                                            <li><strong>Phone:</strong> +62 123 456 7890</li>
                                            <li><strong>WhatsApp:</strong> +62 123 456 7890</li>
                                            <li><strong>Live Chat:</strong> Available on our website</li>
                                        </ul>
                                        For urgent issues, we recommend calling or using WhatsApp for fastest response.
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- No Results Message -->
                    <div id="noResults" class="text-center py-5" style="display: none;">
                        <i class="fas fa-search fa-3x text-muted mb-3"></i>
                        <h4>No FAQ Found</h4>
                        <p class="text-muted">No frequently asked questions match your search criteria.</p>
                        <button id="showAllFaq" class="th-btn">Show All FAQ</button>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="bg-primary text-white p-5 rounded text-center">
                        <h3 class="text-white mb-3">Still have questions?</h3>
                        <p class="text-white mb-4">Can't find the answer you're looking for? Our team is here to help!</p>
                        <div class="d-flex flex-wrap justify-content-center gap-3">
                            <a href="{{ url('/contact') }}" class="th-btn style2">Contact Us</a>
                            <a href="mailto:info@cloudify.id" class="th-btn style2">Send Email</a>
                            <a href="https://wa.me/62123456789" target="_blank" class="th-btn style2">WhatsApp</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="shape-mockup" data-top="0%" data-right="0%">
            <img src="{{ asset('assets_frontend/assets/img/shape/tech_shape_1.png') }}" alt="shape">
        </div>
        <div class="shape-mockup" data-bottom="0%" data-left="0%">
            <img src="{{ asset('assets_frontend/assets/img/shape/tech_shape_2.png') }}" alt="shape">
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('faqSearch');
            const categorySelect = document.getElementById('faqCategory');
            const clearFilter = document.getElementById('clearFilter');
            const faqItems = document.querySelectorAll('.faq-item');
            const noResults = document.getElementById('noResults');
            const showAllFaq = document.getElementById('showAllFaq');

            function filterFAQ() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedCategory = categorySelect.value;
                let visibleCount = 0;

                faqItems.forEach(item => {
                    const category = item.getAttribute('data-category');
                    const text = item.textContent.toLowerCase();
                    
                    const matchesSearch = searchTerm === '' || text.includes(searchTerm);
                    const matchesCategory = selectedCategory === '' || category === selectedCategory;
                    
                    if (matchesSearch && matchesCategory) {
                        item.style.display = 'block';
                        visibleCount++;
                    } else {
                        item.style.display = 'none';
                    }
                });

                if (visibleCount === 0) {
                    noResults.style.display = 'block';
                } else {
                    noResults.style.display = 'none';
                }
            }

            function clearFilters() {
                searchInput.value = '';
                categorySelect.value = '';
                filterFAQ();
            }

            searchInput.addEventListener('input', filterFAQ);
            categorySelect.addEventListener('change', filterFAQ);
            clearFilter.addEventListener('click', clearFilters);
            showAllFaq.addEventListener('click', clearFilters);
        });
    </script>
@endsection
