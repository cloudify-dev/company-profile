<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
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
}
