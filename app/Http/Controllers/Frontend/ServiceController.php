<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageSetting;
use App\Models\Service;
use App\Models\ServicePage;
use App\Models\Testimonial;
use App\Models\SectionTitle;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        $testimonials = Testimonial::where('is_active', true)->ordered()->get();
        $pageSettings = PageSetting::where('page_name', 'service')->first();
        $servicePage = ServicePage::where('is_active', true)->first();
        
        // Get section titles
        $testimonialTitle = SectionTitle::getForSection('testimonial');
        
        // If no service page settings found, create default
        if (!$servicePage) {
            $servicePage = new ServicePage();
            $servicePage->process_steps = $servicePage->getDefaultProcessSteps();
        }
        
        return view('frontend.pages.service', compact('services', 'testimonials', 'pageSettings', 'servicePage', 'testimonialTitle'));
    }

    public function show($id)
    {
        $service = Service::with(['features', 'benefits', 'faqs'])->findOrFail($id);
        $allServices = Service::select('id', 'title')->get(); // Get all services for sidebar
        $testimonials = Testimonial::where('is_active', true)->ordered()->get();
        $pageSettings = PageSetting::where('page_name', 'service')->first();
        
        // Get section titles
        $testimonialTitle = SectionTitle::getForSection('testimonial');

        return view('frontend.pages.service-details', compact('service', 'allServices', 'testimonials', 'pageSettings', 'testimonialTitle'));
    }
}
