<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageSetting;
use App\Models\Blog;
use App\Models\BlogPage;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\BlogQuote;
use App\Models\BlogTag;
use App\Models\Tag;


class BlogController extends Controller
{
    public function index(Request $request)
    {
        // $blogs = Blog::latest()->get();
        $query = Blog::query();

        $blogCategories = BlogCategory::latest()->take(5)->get();
        $blogPage = BlogPage::where('is_active', true)->first();

        $recentPosts = Blog::latest()->take(3)->get();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('author', 'like', '%' . $request->search . '%');
        }

        $blogs = $query->with(['blogQuote', 'blogTags', 'blogComments'])
            ->latest()
            ->paginate(5)
            ->withQueryString();
        // If no service page settings found, create default
        if (!$blogPage) {
            $blogPage = new BlogPage();
            // $blogPage->process_steps = $blogPage->getDefaultProcessSteps();
        }

        return view('frontend.pages.blog', compact('blogs', 'blogCategories', 'blogPage', 'recentPosts'));
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        // $testimonials = Testimonial::where('is_active', true)->ordered()->get();
        $pageSettings = PageSetting::where('page_name', 'service')->first();

        // Get section titles
        // $testimonialTitle = SectionTitle::getForSection('testimonial');

        // return view('frontend.pages.blog-details', compact('service', 'testimonials', 'pageSettings', 'testimonialTitle'));
    }
}
