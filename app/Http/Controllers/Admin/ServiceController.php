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
            'features' => 'array',
            'features.*' => 'string',
            'benefits' => 'array',
            'benefits.*.icon' => 'string',
            'benefits.*.title' => 'string',
            'benefits.*.description' => 'string',
            'faqs' => 'array',
            'faqs.*.question' => 'string',
            'faqs.*.answer' => 'string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('service_images', 'public');
        }

        $service = Service::create($data);

        if (isset($data['features'])) {
            foreach ($data['features'] as $feature) {
                $service->features()->create(['text' => $feature]);
            }
        }

        if (isset($data['benefits'])) {
            foreach ($data['benefits'] as $benefit) {
                $service->benefits()->create($benefit);
            }
        }

        if (isset($data['faqs'])) {
            foreach ($data['faqs'] as $faq) {
                $service->faqs()->create($faq);
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
            'features' => 'array',
            'features.*' => 'string',
            'benefits' => 'array',
            'benefits.*.icon' => 'string',
            'benefits.*.title' => 'string',
            'benefits.*.description' => 'string',
            'faqs' => 'array',
            'faqs.*.question' => 'string',
            'faqs.*.answer' => 'string',
        ]);

        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $request->file('image')->store('service_images', 'public');
        }

        $service->update($data);

        $service->features()->delete();
        if (isset($data['features'])) {
            foreach ($data['features'] as $feature) {
                $service->features()->create(['text' => $feature]);
            }
        }

        $service->benefits()->delete();
        if (isset($data['benefits'])) {
            foreach ($data['benefits'] as $benefit) {
                $service->benefits()->create($benefit);
            }
        }

        $service->faqs()->delete();
        if (isset($data['faqs'])) {
            foreach ($data['faqs'] as $faq) {
                $service->faqs()->create($faq);
            }
        }

        return redirect()->route('admin.service.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
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
