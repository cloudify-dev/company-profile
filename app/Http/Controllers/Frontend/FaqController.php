<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageSetting;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $pageSettings = PageSetting::where('page_name', 'faq')->first();
        
        // Get FAQs grouped by category
        $faqs = Faq::active()->ordered()->get()->groupBy('category');
        
        return view('frontend.pages.faq', compact('pageSettings', 'faqs'));
    }
}
