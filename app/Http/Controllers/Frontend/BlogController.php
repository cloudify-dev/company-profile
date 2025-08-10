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
    public function index()
    {
        // $blogs = Blog::latest()->get();
        $blogs = Blog::with(['blogQuote', 'blogTags', 'blogComments'])
            ->latest()
            ->paginate(5);
        $blogCategory = BlogCategory::latest()->get();
        $blogPage = BlogPage::where('is_active', true)->first();

        $recentPosts = Blog::latest()->take(3)->get();

        // If no service page settings found, create default
        if (!$blogPage) {
            $blogPage = new BlogPage();
            // $blogPage->process_steps = $blogPage->getDefaultProcessSteps();
        }

        return view('frontend.pages.blog', compact('blogs', 'blogCategory', 'blogPage', 'recentPosts'));
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
