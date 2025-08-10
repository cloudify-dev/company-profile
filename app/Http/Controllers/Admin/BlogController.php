<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\ServicePage;
use App\Models\ServiceFeature;
use App\Models\ServiceBenefit;
use App\Models\ServiceFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogCategories = BlogCategory::all();

        $blogs = Blog::query();

        // Filter berdasarkan kategori jika dipilih
        if ($request->has('category_id') && $request->category_id) {
            $blogs->where('blog_category_id', $request->category_id);
        }

        $blogs = $blogs->with(['blogQuote', 'blogTags', 'blogComments'])->get();

        return view('backend.pages.blog.index', compact('blogCategories', 'blogs'));
    }

    public function create()
    {
        $blogCategories = BlogCategory::all();

        return view('backend.pages.blog.create', compact('blogCategories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'blog_category_id' => 'required|integer',
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'tag_name' => 'nullable|string',
            'quote' => 'required|string',
            'email' => 'nullable|string',
            'name' => 'nullable|string',
            'website' => 'nullable|string',
            'comment' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blog_images', 'public');
        }

        $blog = Blog::create($data);
        $blog->blogQuote()->create([
            'text' => $data['quote']
            // No need to specify blog_id as Eloquent handles this
        ]);
        $blog->blogTags()->create([
            'tag_name' => $data['tag_name']
            // No need to specify blog_id as Eloquent handles this
        ]);
        if ($data['comment'] ?? false) {
            $blog->blogComments()->create([
                'email' => $data['email'] ?? null,
                'name' => $data['name'] ?? null,
                'website' => $data['website'] ?? null,
                'comment' => $data['comment'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect()->route('admin.blog.index')->with('success', 'blog created successfully.');
    }

    public function edit(Blog $blog)
    {   
        $blogCategories = BlogCategory::all();

        $blog->load(['blogComments', 'blogTags', 'blogQuote']);
        return view('backend.pages.blog.edit', compact('blog', 'blogCategories'));
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
