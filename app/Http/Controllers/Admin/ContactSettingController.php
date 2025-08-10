<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use Illuminate\Http\Request;

class ContactSettingController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactSetting::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('subtitle', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }


        $contactSettings = $query->orderBy('created_at', 'desc')->paginate(30);
        $contactSettings->appends($request->query());

        return view('backend.pages.contact-settings.index', compact('contactSettings'));
    }

    public function create()
    {
        return view('backend.pages.contact-settings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'addresses' => 'nullable|array',
            'addresses.*' => 'string',
            'phones' => 'nullable|array',
            'phones.*' => 'string',
            'emails' => 'nullable|array',
            'emails.*' => 'email',
            'contact_action_type' => 'required|in:email,whatsapp',
            'contact_action_value' => 'nullable|string',
            'map_embed_url' => 'nullable|url',
            'is_active' => 'boolean'
        ]);

        // Filter out empty values
        $validated['addresses'] = array_filter($validated['addresses'] ?? []);
        $validated['phones'] = array_filter($validated['phones'] ?? []);
        $validated['emails'] = array_filter($validated['emails'] ?? []);
        $validated['is_active'] = $request->has('is_active');

        $result = ContactSetting::create($validated);

        // Kalau is active true, set data lain yang is_active false
        if ($result->is_active) {
            ContactSetting::where('id', '!=', $result->id)->update(['is_active' => false]);
        }

        return redirect()->route('admin.contact-settings.index')
            ->with('success', 'Contact settings created successfully.');
    }

    public function edit(ContactSetting $contactSetting)
    {
        return view('backend.pages.contact-settings.edit', compact('contactSetting'));
    }

    public function update(Request $request, ContactSetting $contactSetting)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'addresses' => 'nullable|array',
            'addresses.*' => 'string',
            'phones' => 'nullable|array',
            'phones.*' => 'string',
            'emails' => 'nullable|array',
            'emails.*' => 'email',
            'contact_action_type' => 'required|in:email,whatsapp',
            'contact_action_value' => 'nullable|string',
            'map_embed_url' => 'nullable|url',
            'is_active' => 'boolean'
        ]);

        // Filter out empty values
        $validated['addresses'] = array_filter($validated['addresses'] ?? []);
        $validated['phones'] = array_filter($validated['phones'] ?? []);
        $validated['emails'] = array_filter($validated['emails'] ?? []);
        $validated['is_active'] = $request->has('is_active');

        $contactSetting->update($validated);

        // Kalau is active true, set data lain yang is_active false
        if ($contactSetting->is_active) {
            ContactSetting::where('id', '!=', $contactSetting->id)->update(['is_active' => false]);
        }

        return redirect()->route('admin.contact-settings.index')
            ->with('success', 'Contact settings updated successfully.');
    }

    public function destroy(ContactSetting $contactSetting)
    {
        $contactSetting->delete();

        return redirect()->route('admin.contact-settings.index')
            ->with('success', 'Contact settings deleted successfully.');
    }
}
