<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use App\Models\PageSetting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contactSetting = ContactSetting::getActive();
        $pageSettings = PageSetting::where('page_name', 'contact')->first();
        return view('frontend.pages.contact', compact('contactSetting', 'pageSettings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'number' => 'nullable|string|max:20',
            'message' => 'required|string'
        ]);

        // Here you can implement sending email or storing the message
        // For now, we'll just return a success response
        
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
