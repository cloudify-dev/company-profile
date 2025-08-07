<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageSetting;
use App\Models\Service;
use App\Models\ServicePage;
use App\Models\Testimonial;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        $testimonials = Testimonial::where('is_active', true)->ordered()->get();
        $pageSettings = PageSetting::where('page_name', 'service')->first();
        $servicePage = ServicePage::where('is_active', true)->first();
        
        // If no service page settings found, create default
        if (!$servicePage) {
            $servicePage = new ServicePage();
            $servicePage->process_steps = $servicePage->getDefaultProcessSteps();
        }
        
        return view('frontend.pages.service', compact('services', 'testimonials', 'pageSettings', 'servicePage'));
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        $testimonials = Testimonial::where('is_active', true)->ordered()->get();
        $pageSettings = PageSetting::where('page_name', 'service')->first();

        return view('frontend.pages.service-details', compact('service', 'testimonials', 'pageSettings'));
    }
}
