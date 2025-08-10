<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use App\Models\WhyChooseUsFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WhyChooseUsController extends Controller
{
    public function index(Request $request)
    {
        $query = WhyChooseUs::query();
        
        // Get search and filter parameters
        $search = $request->get('search');
        $status = $request->get('status');

        // Apply search and filters
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('subtitle', 'like', "%{$search}%")
                  ->orWhere('title_black', 'like', "%{$search}%")
                  ->orWhere('title_blue', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($status !== null) {
            $query->where('is_active', $status === 'active');
        }

        // Get paginated results
        $whyChooseUs = $query->ordered()->paginate(10)->withQueryString();

        return view('backend.pages.why-choose-us.index', compact('whyChooseUs'));
    }

    public function create()
    {
        return view('backend.pages.why-choose-us.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'subtitle' => 'required|string|max:255',
            'title_black' => 'required|string|max:255',
            'title_blue' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer'
        ]);

        $data['is_active'] = $request->has('is_active') && $request->is_active == '1';
        $data['sort_order'] = $data['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('why_choose_us_images', 'public');
        }

        WhyChooseUs::create($data);

        return redirect()->route('admin.why-choose-us.index')->with('success', 'Why Choose Us section created successfully.');
    }

    public function show(WhyChooseUs $whyChooseUs)
    {
        return view('backend.pages.why-choose-us.show', compact('whyChooseUs'));
    }

    public function edit(WhyChooseUs $whyChooseUs)
    {
        return view('backend.pages.why-choose-us.edit', compact('whyChooseUs'));
    }

    public function update(Request $request, WhyChooseUs $whyChooseUs)
    {
        $data = $request->validate([
            'subtitle' => 'required|string|max:255',
            'title_black' => 'required|string|max:255',
            'title_blue' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer'
        ]);

        $data['is_active'] = $request->has('is_active') && $request->is_active == '1';
        $data['sort_order'] = $data['sort_order'] ?? $whyChooseUs->sort_order;

        if ($request->hasFile('image')) {
            // Delete old image
            if ($whyChooseUs->image) {
                Storage::disk('public')->delete($whyChooseUs->image);
            }
            $data['image'] = $request->file('image')->store('why_choose_us_images', 'public');
        }

        $whyChooseUs->update($data);

        return redirect()->route('admin.why-choose-us.index')->with('success', 'Why Choose Us section updated successfully.');
    }

    public function destroy(WhyChooseUs $whyChooseUs)
    {
        // Delete image if exists
        if ($whyChooseUs->image) {
            Storage::disk('public')->delete($whyChooseUs->image);
        }

        $whyChooseUs->delete();

        return redirect()->route('admin.why-choose-us.index')->with('success', 'Why Choose Us section deleted successfully.');
    }

    public function toggle(WhyChooseUs $whyChooseUs)
    {
        $whyChooseUs->update(['is_active' => !$whyChooseUs->is_active]);
        
        $status = $whyChooseUs->is_active ? 'activated' : 'deactivated';
        return redirect()->route('admin.why-choose-us.index')->with('success', "Why Choose Us section {$status} successfully.");
    }

    // Feature management methods
    public function features(WhyChooseUs $whyChooseUs)
    {
        $features = $whyChooseUs->features()->ordered()->get();
        return view('backend.pages.why-choose-us.features.index', compact('whyChooseUs', 'features'));
    }

    public function createFeature(WhyChooseUs $whyChooseUs)
    {
        return view('backend.pages.why-choose-us.features.create', compact('whyChooseUs'));
    }

    public function storeFeature(Request $request, WhyChooseUs $whyChooseUs)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer'
        ]);

        $data['why_choose_us_id'] = $whyChooseUs->id;
        $data['is_active'] = $request->has('is_active') && $request->is_active == '1';
        $data['sort_order'] = $data['sort_order'] ?? 0;

        WhyChooseUsFeature::create($data);

        return redirect()->route('admin.why-choose-us.features', $whyChooseUs)->with('success', 'Feature created successfully.');
    }

    public function editFeature(WhyChooseUs $whyChooseUs, WhyChooseUsFeature $feature)
    {
        return view('backend.pages.why-choose-us.features.edit', compact('whyChooseUs', 'feature'));
    }

    public function updateFeature(Request $request, WhyChooseUs $whyChooseUs, WhyChooseUsFeature $feature)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer'
        ]);

        $data['is_active'] = $request->has('is_active') && $request->is_active == '1';
        $data['sort_order'] = $data['sort_order'] ?? $feature->sort_order;

        $feature->update($data);

        return redirect()->route('admin.why-choose-us.features', $whyChooseUs)->with('success', 'Feature updated successfully.');
    }

    public function destroyFeature(WhyChooseUs $whyChooseUs, WhyChooseUsFeature $feature)
    {
        $feature->delete();

        return redirect()->route('admin.why-choose-us.features', $whyChooseUs)->with('success', 'Feature deleted successfully.');
    }

    public function toggleFeature(WhyChooseUs $whyChooseUs, WhyChooseUsFeature $feature)
    {
        $feature->update(['is_active' => !$feature->is_active]);
        
        $status = $feature->is_active ? 'activated' : 'deactivated';
        return redirect()->route('admin.why-choose-us.features', $whyChooseUs)->with('success', "Feature {$status} successfully.");
    }
}
