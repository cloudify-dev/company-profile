<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSection;
use App\Models\ContactFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactSectionController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactSection::query();
        
        // Get search and filter parameters
        $search = $request->get('search');
        $status = $request->get('status');

        // Apply search and filters
        if ($search) {
            $query->where('form_title', 'like', "%{$search}%");
        }

        if ($status !== null) {
            $query->where('is_active', $status === 'active');
        }

        // Get paginated results
        $contactSections = $query->paginate(10)->withQueryString();

        return view('backend.pages.contact-section.index', compact('contactSections'));
    }

    public function create()
    {
        return view('backend.pages.contact-section.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'form_title' => 'required|string|max:255',
            'background_image' => 'nullable|image|max:2048',
            'is_active' => 'boolean'
        ]);

        $data['is_active'] = $request->has('is_active') && $request->is_active == '1';

        if ($request->hasFile('background_image')) {
            $data['background_image'] = $request->file('background_image')->store('contact_backgrounds', 'public');
        }

        ContactSection::create($data);

        return redirect()->route('admin.contact-section.index')->with('success', 'Contact section created successfully.');
    }

    public function show(ContactSection $contactSection)
    {
        return view('backend.pages.contact-section.show', compact('contactSection'));
    }

    public function edit(ContactSection $contactSection)
    {
        return view('backend.pages.contact-section.edit', compact('contactSection'));
    }

    public function update(Request $request, ContactSection $contactSection)
    {
        $data = $request->validate([
            'form_title' => 'required|string|max:255',
            'background_image' => 'nullable|image|max:2048',
            'is_active' => 'boolean'
        ]);

        $data['is_active'] = $request->has('is_active') && $request->is_active == '1';

        if ($request->hasFile('background_image')) {
            // Delete old image
            if ($contactSection->background_image) {
                Storage::disk('public')->delete($contactSection->background_image);
            }
            $data['background_image'] = $request->file('background_image')->store('contact_backgrounds', 'public');
        }

        $contactSection->update($data);

        return redirect()->route('admin.contact-section.index')->with('success', 'Contact section updated successfully.');
    }

    public function destroy(ContactSection $contactSection)
    {
        // Delete background image if exists
        if ($contactSection->background_image) {
            Storage::disk('public')->delete($contactSection->background_image);
        }

        $contactSection->delete();

        return redirect()->route('admin.contact-section.index')->with('success', 'Contact section deleted successfully.');
    }

    public function toggle(ContactSection $contactSection)
    {
        $contactSection->update(['is_active' => !$contactSection->is_active]);
        
        $status = $contactSection->is_active ? 'activated' : 'deactivated';
        return redirect()->route('admin.contact-section.index')->with('success', "Contact section {$status} successfully.");
    }

    // Feature management methods
    public function features(ContactSection $contactSection)
    {
        $features = $contactSection->features()->ordered()->get();
        return view('backend.pages.contact-section.features.index', compact('contactSection', 'features'));
    }

    public function createFeature(ContactSection $contactSection)
    {
        return view('backend.pages.contact-section.features.create', compact('contactSection'));
    }

    public function storeFeature(Request $request, ContactSection $contactSection)
    {
        $data = $request->validate([
            'icon' => 'required|string',
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'link' => 'nullable|string',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer'
        ]);

        $data['contact_section_id'] = $contactSection->id;
        $data['is_active'] = $request->has('is_active') && $request->is_active == '1';
        $data['sort_order'] = $data['sort_order'] ?? 0;

        ContactFeature::create($data);

        return redirect()->route('admin.contact-section.features', $contactSection)->with('success', 'Contact feature created successfully.');
    }

    public function editFeature(ContactSection $contactSection, ContactFeature $feature)
    {
        return view('backend.pages.contact-section.features.edit', compact('contactSection', 'feature'));
    }

    public function updateFeature(Request $request, ContactSection $contactSection, ContactFeature $feature)
    {
        $data = $request->validate([
            'icon' => 'required|string',
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'link' => 'nullable|string',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer'
        ]);

        $data['is_active'] = $request->has('is_active') && $request->is_active == '1';
        $data['sort_order'] = $data['sort_order'] ?? $feature->sort_order;

        $feature->update($data);

        return redirect()->route('admin.contact-section.features', $contactSection)->with('success', 'Contact feature updated successfully.');
    }

    public function destroyFeature(ContactSection $contactSection, ContactFeature $feature)
    {
        $feature->delete();

        return redirect()->route('admin.contact-section.features', $contactSection)->with('success', 'Contact feature deleted successfully.');
    }

    public function toggleFeature(ContactSection $contactSection, ContactFeature $feature)
    {
        $feature->update(['is_active' => !$feature->is_active]);
        
        $status = $feature->is_active ? 'activated' : 'deactivated';
        return redirect()->route('admin.contact-section.features', $contactSection)->with('success', "Contact feature {$status} successfully.");
    }
}
