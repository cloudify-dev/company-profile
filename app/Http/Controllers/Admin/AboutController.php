<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUsPage;
use App\Models\AboutFeature;
use App\Models\AboutAchievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = AboutUsPage::latest()->get();
        return view('backend.pages.about.index', compact('abouts'));
    }

    public function toggle(AboutUsPage $about)
    {
        $about->is_active = !$about->is_active;
        $about->save();

        // disable all other about us pages data
        AboutUsPage::where('id', '!=', $about->id)->update(['is_active' => false]);

        return back()->with('swal', [
            'title' => 'Success!',
            'text' => $about->is_active ? 'About Us page activated successfully!' : 'About Us page deactivated successfully!',
            'icon' => 'success'
        ]);
    }

    public function create()
    {
        return view('backend.pages.about.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'circle_title' => 'required|string',
            'circle_subtitle' => 'required|string',
            'title_black' => 'required|string',
            'title_blue' => 'required|string',
            'title_description' => 'required|string',
            'phone_number' => 'nullable|string',
        ]);

        $about = AboutUsPage::create($data);

        return redirect()->route('admin.about.index')->with('swal', [
            'title' => 'Success!',
            'text' => 'About Us section created successfully!',
            'icon' => 'success'
        ]);
    }

    public function edit(AboutUsPage $about)
    {
        return view('backend.pages.about.edit', compact('about'));
    }

    public function update(Request $request, AboutUsPage $about)
    {
        $data = $request->validate([
            'circle_title' => 'required|string',
            'circle_subtitle' => 'required|string',
            'title_black' => 'required|string',
            'title_blue' => 'required|string',
            'title_description' => 'required|string',
            'phone_number' => 'nullable|string',
        ]);

        $about->update($data);

        return redirect()->route('admin.about.index')->with('swal', [
            'title' => 'Success!',
            'text' => 'About Us section updated successfully!',
            'icon' => 'success'
        ]);
    }

    public function destroy(AboutUsPage $about)
    {
        $about->delete();
        return redirect()->route('admin.about.index')->with('swal', [
            'title' => 'Deleted!',
            'text' => 'About Us section deleted successfully!',
            'icon' => 'success'
        ]);
    }

    // ====== ABOUT FEATURES CRUD METHODS ======

    /**
     * Show features for a specific about page
     */
    public function features(AboutUsPage $about)
    {
        $features = $about->features()->ordered()->get();
        return view('backend.pages.about.features.index', compact('about', 'features'));
    }

    /**
     * Show form to create a new feature
     */
    public function createFeature(AboutUsPage $about)
    {
        return view('backend.pages.about.features.create', compact('about'));
    }

    /**
     * Store a new feature
     */
    public function storeFeature(Request $request, AboutUsPage $about)
    {
        $data = $request->validate([
            'image' => 'nullable|image|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('feature_images', 'public');
        }

        // Set default sort order if not provided
        if (!isset($data['sort_order'])) {
            $data['sort_order'] = $about->features()->max('sort_order') + 1;
        }

        $data['about_id'] = $about->id;
        $data['is_active'] = $request->has('is_active');

        AboutFeature::create($data);

        return redirect()->route('admin.about.features', $about->id)->with('swal', [
            'title' => 'Success!',
            'text' => 'Feature created successfully!',
            'icon' => 'success'
        ]);
    }

    /**
     * Show form to edit a feature
     */
    public function editFeature(AboutUsPage $about, AboutFeature $feature)
    {
        // Ensure feature belongs to this about page
        if ($feature->about_id !== $about->id) {
            abort(404);
        }

        return view('backend.pages.about.features.edit', compact('about', 'feature'));
    }

    /**
     * Update a feature
     */
    public function updateFeature(Request $request, AboutUsPage $about, AboutFeature $feature)
    {
        // Ensure feature belongs to this about page
        if ($feature->about_id !== $about->id) {
            abort(404);
        }

        $data = $request->validate([
            'image' => 'nullable|image|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            if ($feature->image) {
                Storage::disk('public')->delete($feature->image);
            }
            $data['image'] = $request->file('image')->store('feature_images', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        $feature->update($data);

        return redirect()->route('admin.about.features', $about->id)->with('swal', [
            'title' => 'Success!',
            'text' => 'Feature updated successfully!',
            'icon' => 'success'
        ]);
    }

    /**
     * Delete a feature
     */
    public function destroyFeature(AboutUsPage $about, AboutFeature $feature)
    {
        // Ensure feature belongs to this about page
        if ($feature->about_id !== $about->id) {
            abort(404);
        }

        $feature->delete();

        if ($feature->image) {
            Storage::disk('public')->delete($feature->image);
        }

        return redirect()->route('admin.about.features', $about->id)->with('swal', [
            'title' => 'Deleted!',
            'text' => 'Feature deleted successfully!',
            'icon' => 'success'
        ]);
    }

    /**
     * Toggle feature active status
     */
    public function toggleFeature(AboutUsPage $about, AboutFeature $feature)
    {
        // Ensure feature belongs to this about page
        if ($feature->about_id !== $about->id) {
            abort(404);
        }

        $feature->is_active = !$feature->is_active;
        $feature->save();

        return back()->with('swal', [
            'title' => 'Success!',
            'text' => $feature->is_active ? 'Feature activated successfully!' : 'Feature deactivated successfully!',
            'icon' => 'success'
        ]);
    }

}
