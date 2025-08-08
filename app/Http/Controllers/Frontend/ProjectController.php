<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageSetting;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::query();
        
        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        
        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        // Get featured projects
        $featuredProjects = Project::query()
            ->where('is_featured', true)
            ->where('status', 'active')
            ->latest()
            ->orderBy('sort_order', 'asc')
            ->limit(4)
            ->get();
        
        // Get all projects with pagination
        $projects = $query->latest()
            ->where('is_featured', false)
            ->where('status', 'active')
            ->orderBy('sort_order', 'asc')
            ->paginate(9);

        // Preserve query parameters in pagination
        $projects->appends($request->query());
        
        $pageSettings = PageSetting::where('page_name', 'project')->first();
        
        return view('frontend.pages.project', compact('projects', 'featuredProjects', 'pageSettings'));
    }

    public function details($id)
    {
        $project = Project::findOrFail($id);
        $pageSettings = PageSetting::where('page_name', 'project')->first();

        return view('frontend.pages.project-details', compact('project', 'pageSettings'));
    }
}
