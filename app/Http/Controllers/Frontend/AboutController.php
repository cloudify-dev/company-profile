<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\AboutUsPage;
use App\Models\SectionTitle;

class AboutController extends Controller
{
    public function index()
    {
        // Get teams and testimonials
        $teams = Team::where('is_active', true)->ordered()->get();
        $testimonials = Testimonial::where('is_active', true)->ordered()->get();
        
        // Get about page with relationships
        $about = AboutUsPage::with(['features' => function($query) {
            $query->where('is_active', true)->ordered();
        }, 'achievements' => function($query) {
            $query->where('is_active', true)->ordered();
        }])->where('is_active', true)->first();
        
        // Fallback if no active about page exists
        if (!$about) {
            $about = AboutUsPage::with(['features' => function($query) {
                $query->where('is_active', true)->ordered();
            }, 'achievements' => function($query) {
                $query->where('is_active', true)->ordered();
            }])->first();
        }
        
        // Get section titles
        $teamTitle = SectionTitle::getForSection('team');
        $testimonialTitle = SectionTitle::getForSection('testimonial');
        
        return view('frontend.pages.about', compact('teams', 'testimonials', 'about', 'teamTitle', 'testimonialTitle'));
    }
}
