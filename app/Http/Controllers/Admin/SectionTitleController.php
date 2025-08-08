<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SectionTitle;
use Illuminate\Http\Request;

class SectionTitleController extends Controller
{
    public function index()
    {
        $sectionTitles = SectionTitle::orderBy('section_name')->get();
        return view('backend.pages.section-titles.index', compact('sectionTitles'));
    }

    public function create()
    {
        return view('backend.pages.section-titles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'section_name' => 'required|string|unique:section_titles,section_name',
            'subtitle' => 'required|string',
            'title_black' => 'required|string',
            'title_blue' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $data['is_active'] = $request->has('is_active');

        SectionTitle::create($data);

        return redirect()->route('admin.section-titles.index')->with('swal', [
            'title' => 'Success!',
            'text' => 'Section title created successfully!',
            'icon' => 'success'
        ]);
    }

    public function show(SectionTitle $sectionTitle)
    {
        return view('backend.pages.section-titles.show', compact('sectionTitle'));
    }

    public function edit(SectionTitle $sectionTitle)
    {
        return view('backend.pages.section-titles.edit', compact('sectionTitle'));
    }

    public function update(Request $request, SectionTitle $sectionTitle)
    {
        $data = $request->validate([
            'section_name' => 'required|string|unique:section_titles,section_name,' . $sectionTitle->id,
            'subtitle' => 'required|string',
            'title_black' => 'required|string',
            'title_blue' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $data['is_active'] = $request->has('is_active');

        $sectionTitle->update($data);

        return redirect()->route('admin.section-titles.index')->with('swal', [
            'title' => 'Success!',
            'text' => 'Section title updated successfully!',
            'icon' => 'success'
        ]);
    }

    public function destroy(SectionTitle $sectionTitle)
    {
        $sectionTitle->delete();

        return redirect()->route('admin.section-titles.index')->with('swal', [
            'title' => 'Deleted!',
            'text' => 'Section title deleted successfully!',
            'icon' => 'success'
        ]);
    }

    public function toggle(SectionTitle $sectionTitle)
    {
        $sectionTitle->is_active = !$sectionTitle->is_active;
        $sectionTitle->save();

        return back()->with('swal', [
            'title' => 'Success!',
            'text' => $sectionTitle->is_active ? 'Section title activated successfully!' : 'Section title deactivated successfully!',
            'icon' => 'success'
        ]);
    }
}
