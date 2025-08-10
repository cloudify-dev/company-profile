<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServicePage;
use App\Models\ServiceFeature;
use App\Models\ServiceBenefit;
use App\Models\ServiceFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with(['features', 'benefits', 'faqs'])->get();
        return view('backend.pages.service.index', compact('services'));
    }

    public function create()
    {
        return view('backend.pages.service.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'video_url' => 'nullable|url',
            'video_thumbnail' => 'nullable|image|max:2048',
            'section_title' => 'nullable|string',
            'checklist_items' => 'nullable|array',
            'checklist_items.*' => 'string',
            'additional_description' => 'nullable|string',
            'benefits_title' => 'nullable|string',
            'faqs_title' => 'nullable|string',
            'sidebar_title' => 'nullable|string',
            'brochure_pdf' => 'nullable|file|mimes:pdf|max:10240',
            'brochure_doc' => 'nullable|file|mimes:doc,docx|max:10240',
            'contact_widget_text' => 'nullable|string',
            'contact_widget_title' => 'nullable|string',
            'contact_widget_button_text' => 'nullable|string',
            'contact_widget_button_link' => 'nullable|string',
            'contact_widget_background' => 'nullable|image|max:2048',
            'features' => 'nullable|array',
            'features.*' => 'nullable|string',
            'benefits' => 'nullable|array',
            'benefits.*.title' => 'nullable|string',
            'benefits.*.description' => 'nullable|string',
            'benefits.*.icon' => 'nullable|string',
            'benefits.*.icon_file' => 'nullable|image|max:2048',
            'faqs' => 'nullable|array',
            'faqs.*.question' => 'nullable|string',
            'faqs.*.answer' => 'nullable|string',
        ]);

        // Handle file uploads
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('service_images', 'public');
        }
        
        if ($request->hasFile('video_thumbnail')) {
            $data['video_thumbnail'] = $request->file('video_thumbnail')->store('service_videos', 'public');
        }
        
        if ($request->hasFile('brochure_pdf')) {
            $data['brochure_pdf'] = $request->file('brochure_pdf')->store('service_brochures', 'public');
        }
        
        if ($request->hasFile('brochure_doc')) {
            $data['brochure_doc'] = $request->file('brochure_doc')->store('service_brochures', 'public');
        }
        
        if ($request->hasFile('contact_widget_background')) {
            $data['contact_widget_background'] = $request->file('contact_widget_background')->store('service_widgets', 'public');
        }

        $service = Service::create($data);

        if (isset($data['features'])) {
            foreach ($data['features'] as $feature) {
                if (!empty($feature)) {
                    $service->features()->create(['text' => $feature]);
                }
            }
        }

        if (isset($data['benefits'])) {
            foreach ($data['benefits'] as $index => $benefit) {
                // Handle icon file upload for each benefit
                if ($request->hasFile("benefits.{$index}.icon_file")) {
                    $benefit['icon'] = $request->file("benefits.{$index}.icon_file")->store('service_benefit_icons', 'public');
                }
                
                // Only create if title and description are provided
                if (!empty($benefit['title']) && !empty($benefit['description'])) {
                    $service->benefits()->create([
                        'title' => $benefit['title'],
                        'description' => $benefit['description'],
                        'icon' => $benefit['icon'] ?? null,
                    ]);
                }
            }
        }

        if (isset($data['faqs'])) {
            foreach ($data['faqs'] as $faq) {
                // Only create if question and answer are provided
                if (!empty($faq['question']) && !empty($faq['answer'])) {
                    $service->faqs()->create($faq);
                }
            }
        }

        return redirect()->route('admin.service.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        $service->load(['features', 'benefits', 'faqs']);
        return view('backend.pages.service.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'video_url' => 'nullable|url',
            'video_thumbnail' => 'nullable|image|max:2048',
            'section_title' => 'nullable|string',
            'checklist_items' => 'nullable|array',
            'checklist_items.*' => 'string',
            'additional_description' => 'nullable|string',
            'benefits_title' => 'nullable|string',
            'faqs_title' => 'nullable|string',
            'sidebar_title' => 'nullable|string',
            'brochure_pdf' => 'nullable|file|mimes:pdf|max:10240',
            'brochure_doc' => 'nullable|file|mimes:doc,docx|max:10240',
            'contact_widget_text' => 'nullable|string',
            'contact_widget_title' => 'nullable|string',
            'contact_widget_button_text' => 'nullable|string',
            'contact_widget_button_link' => 'nullable|string',
            'contact_widget_background' => 'nullable|image|max:2048',
            'features' => 'nullable|array',
            'features.*' => 'nullable|string',
            'benefits' => 'nullable|array',
            'benefits.*.title' => 'nullable|string',
            'benefits.*.description' => 'nullable|string',
            'benefits.*.icon' => 'nullable|string',
            'benefits.*.icon_file' => 'nullable|image|max:2048',
            'faqs' => 'nullable|array',
            'faqs.*.question' => 'nullable|string',
            'faqs.*.answer' => 'nullable|string',
        ]);

        // Handle file uploads
        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $request->file('image')->store('service_images', 'public');
        }
        
        if ($request->hasFile('video_thumbnail')) {
            if ($service->video_thumbnail) {
                Storage::disk('public')->delete($service->video_thumbnail);
            }
            $data['video_thumbnail'] = $request->file('video_thumbnail')->store('service_videos', 'public');
        }
        
        if ($request->hasFile('brochure_pdf')) {
            if ($service->brochure_pdf) {
                Storage::disk('public')->delete($service->brochure_pdf);
            }
            $data['brochure_pdf'] = $request->file('brochure_pdf')->store('service_brochures', 'public');
        }
        
        if ($request->hasFile('brochure_doc')) {
            if ($service->brochure_doc) {
                Storage::disk('public')->delete($service->brochure_doc);
            }
            $data['brochure_doc'] = $request->file('brochure_doc')->store('service_brochures', 'public');
        }
        
        if ($request->hasFile('contact_widget_background')) {
            if ($service->contact_widget_background) {
                Storage::disk('public')->delete($service->contact_widget_background);
            }
            $data['contact_widget_background'] = $request->file('contact_widget_background')->store('service_widgets', 'public');
        }

        $service->update($data);

        $service->features()->delete();
        if (isset($data['features'])) {
            foreach ($data['features'] as $feature) {
                if (!empty($feature)) {
                    $service->features()->create(['text' => $feature]);
                }
            }
        }

        $service->benefits()->delete();
        if (isset($data['benefits'])) {
            foreach ($data['benefits'] as $index => $benefit) {
                // Handle icon file upload for each benefit
                if ($request->hasFile("benefits.{$index}.icon_file")) {
                    $benefit['icon'] = $request->file("benefits.{$index}.icon_file")->store('service_benefit_icons', 'public');
                }
                
                // Only create if title and description are provided
                if (!empty($benefit['title']) && !empty($benefit['description'])) {
                    $service->benefits()->create([
                        'title' => $benefit['title'],
                        'description' => $benefit['description'],
                        'icon' => $benefit['icon'] ?? null,
                    ]);
                }
            }
        }

        $service->faqs()->delete();
        if (isset($data['faqs'])) {
            foreach ($data['faqs'] as $faq) {
                // Only create if question and answer are provided
                if (!empty($faq['question']) && !empty($faq['answer'])) {
                    $service->faqs()->create($faq);
                }
            }
        }

        return redirect()->route('admin.service.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        // Delete all uploaded files
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        if ($service->video_thumbnail) {
            Storage::disk('public')->delete($service->video_thumbnail);
        }
        if ($service->brochure_pdf) {
            Storage::disk('public')->delete($service->brochure_pdf);
        }
        if ($service->brochure_doc) {
            Storage::disk('public')->delete($service->brochure_doc);
        }
        if ($service->contact_widget_background) {
            Storage::disk('public')->delete($service->contact_widget_background);
        }
        
        $service->delete();
        return redirect()->route('admin.service.index')->with('success', 'Service deleted.');
    }
    
    // ====== SERVICE PAGE CMS METHODS ======
    
    /**
     * Show service page settings
     */
    public function pageSettings()
    {
        $servicePage = ServicePage::first();
        if (!$servicePage) {
            $servicePage = ServicePage::create([]);
        }
        return view('backend.pages.service.page-settings', compact('servicePage'));
    }
    
    /**
     * Update service page settings
     */
    public function updatePageSettings(Request $request)
    {
        $data = $request->validate([
            'breadcrumb_title' => 'required|string|max:255',
            'breadcrumb_image' => 'nullable|image|max:2048',
            'service_section_subtitle' => 'required|string|max:255',
            'service_section_title' => 'required|string|max:255',
            'service_section_description' => 'nullable|string',
            'cta_subtitle' => 'required|string|max:255',
            'cta_title_black' => 'required|string|max:255',
            'cta_title_blue' => 'required|string|max:255',
            'cta_button_text' => 'required|string|max:255',
            'cta_button_link' => 'required|string|max:255',
            'cta_background_image' => 'nullable|image|max:2048',
            'process_subtitle' => 'required|string|max:255',
            'process_title_black' => 'required|string|max:255',
            'process_title_blue' => 'required|string|max:255',
            'testimonial_subtitle' => 'required|string|max:255',
            'testimonial_title_black' => 'required|string|max:255',
            'testimonial_title_blue' => 'required|string|max:255',
            'process_steps' => 'array',
            'process_steps.*.number' => 'required|string',
            'process_steps.*.title' => 'required|string',
            'process_steps.*.icon' => 'required|string',
            'process_steps.*.description' => 'required|string',
            'is_active' => 'boolean'
        ]);
        
        $servicePage = ServicePage::first();
        if (!$servicePage) {
            $servicePage = new ServicePage();
        }
        
        // Handle breadcrumb image upload
        if ($request->hasFile('breadcrumb_image')) {
            if ($servicePage->breadcrumb_image) {
                Storage::disk('public')->delete($servicePage->breadcrumb_image);
            }
            $data['breadcrumb_image'] = $request->file('breadcrumb_image')->store('service_page', 'public');
        }
        
        // Handle CTA background image upload
        if ($request->hasFile('cta_background_image')) {
            if ($servicePage->cta_background_image) {
                Storage::disk('public')->delete($servicePage->cta_background_image);
            }
            $data['cta_background_image'] = $request->file('cta_background_image')->store('service_page', 'public');
        }
        
        $data['is_active'] = $request->has('is_active');
        
        $servicePage->fill($data);
        $servicePage->save();
        
        return redirect()->route('admin.service.page-settings')->with('swal', [
            'title' => 'Success!',
            'text' => 'Service page settings updated successfully!',
            'icon' => 'success'
        ]);
    }
}
