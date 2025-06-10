<?php


namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageSetting;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        $pageSettings = PageSetting::where('page_name', 'project')->first();
        return view('frontend.pages.project', compact('projects', 'pageSettings'));
    }

    public function details($id)
    {
        $project = Project::findOrFail($id); // ambil 1 project berdasarkan id
        $pageSettings = PageSetting::where('page_name', 'project')->first();

        return view('frontend.pages.project-details', compact('project', 'pageSettings'));
    }
}
