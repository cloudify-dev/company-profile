<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BreadcrumbController extends Controller
{
    public function index()
    {
        $breadcrumbs = PageSetting::all();
        return view('backend.pages.breadcrumb.index', compact('breadcrumbs'));
    }

    public function create()
    {
        return view('backend.pages.breadcrumb.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'page_name' => 'required|string',
            'breadcrumb_title' => 'required|string',
            'breadcrumb_image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('breadcrumb_image')) {
            $data['breadcrumb_image'] = $request->file('breadcrumb_image')->store('breadcrumb_images', 'public');
        }

        \App\Models\PageSetting::create($data);

        return redirect()->route('admin.breadcrumb.index')->with('success', 'Breadcrumb created successfully.');
    }



    public function edit(PageSetting $breadcrumb)
    {
        return view('backend.pages.breadcrumb.edit', compact('breadcrumb'));
    }

    public function update(Request $request, PageSetting $breadcrumb)
    {
        $data = $request->validate([
            'page_name'         => 'required|string',
            'breadcrumb_title'  => 'required|string',
            'breadcrumb_image'  => 'nullable|image|max:2048',
        ]);

        // Jika ada file baru di-upload
        if ($request->hasFile('breadcrumb_image')) {
            // Hapus file lama jika ada
            if ($breadcrumb->breadcrumb_image) {
                Storage::disk('public')->delete($breadcrumb->breadcrumb_image);
            }
            // Simpan file baru
            $data['breadcrumb_image'] = $request->file('breadcrumb_image')->store('breadcrumb_images', 'public');
        } else {
            // Pastikan tidak meng-overwrite dengan null jika tidak ada file baru
            unset($data['breadcrumb_image']);
        }

        $breadcrumb->update($data);

        return redirect()->route('admin.breadcrumb.index')->with('success', 'Breadcrumb updated successfully.');
    }

    public function destroy(\App\Models\PageSetting $breadcrumb)
    {
        // Hapus file gambar jika ada
        if ($breadcrumb->breadcrumb_image) {
            Storage::disk('public')->delete($breadcrumb->breadcrumb_image);
        }

        $breadcrumb->delete();

        return redirect()->route('admin.breadcrumb.index')->with('success', 'Breadcrumb deleted successfully.');
    }
}
