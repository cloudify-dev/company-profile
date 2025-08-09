<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageSetting;

class FaqController extends Controller
{
    public function index()
    {
        $pageSettings = PageSetting::where('page_name', 'faq')->first();
        
        return view('frontend.pages.faq', compact('pageSettings'));
    }
}
