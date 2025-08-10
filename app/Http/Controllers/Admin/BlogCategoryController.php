<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $blogCategories = BlogCategory::all();
        return view('backend.pages.blogCategory.index', compact('blogCategories'));
    }

    public function create()
    {
        return view('backend.pages.blogCategory.create');
    }

    public function store(Request $request)
    {
        // Debug the incoming request
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255'
            ]);

            BlogCategory::create([
                'text' => $validated['title']
            ]);

            return redirect()->route('admin.blogCategory.index')->with('success', 'Category created successfully');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to create category');
        }
    }

    public function edit(BlogCategory $blogCategory)
    {
        return view('backend.pages.blogCategory.edit', compact('blogCategory'));
    }

    public function update(Request $request, BlogCategory $blogCategory)
    {
        $data = $request->validate([
            'title' => 'required|string',
        ]);


        $blogCategory->update([
          'text' =>  $data['title']
        ]);

        return redirect()->route('admin.blogCategory.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();
        return redirect()->route('admin.blogCategory.index')->with('success', 'Blog deleted.');
    }
}
