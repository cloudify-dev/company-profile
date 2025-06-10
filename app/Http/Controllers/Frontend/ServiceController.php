<?php


namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageSetting;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        $pageSettings = PageSetting::where('page_name', 'service')->first();
        return view('frontend.pages.service', compact('services', 'pageSettings'));
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        $pageSettings = \App\Models\PageSetting::where('page_name', 'service')->first();

        return view('frontend.pages.service-details', compact('service', 'pageSettings'));
    }
}
