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
        $blogs = Blog::latest()->get();
        $blogCategory = BlogCategory::latest()->get();
        // $testimonials = Testimonial::where('is_active', true)->ordered()->get();
        // $tags = Tag::latest()->get();
        $blogPage = BlogPage::where('is_active', true)->first();
        
        // Get section titles
        // $testimonialTitle = SectionTitle::getForSection('testimonial');
        
        // If no service page settings found, create default
        if (!$blogPage) {
            $blogPage = new BlogPage();
            // $blogPage->process_steps = $blogPage->getDefaultProcessSteps();
        }
        
        return view('frontend.pages.blog', compact('blogs', 'blogCategory', 'blogPage'));
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
