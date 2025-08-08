<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::query();
        
        // Get search and filter parameters
        $search = $request->get('search');
        $category = $request->get('category');
        $isFeatured = $request->get('is_featured');

        // Apply search and filters
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }

        if ($isFeatured !== null) {
            $query->where('is_featured', $isFeatured);
        }

        // Get paginated results
        $projects = $query->ordered()->paginate(10)->withQueryString();

        return view('backend.pages.project.index', compact('projects'));
    }


    public function create()
    {
        return view('backend.pages.project.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'client_name' => 'nullable|string|max:255',
            'project_url' => 'nullable|url',
            'technologies' => 'nullable|string',
            'duration' => 'nullable|string|max:255',
            'budget_range' => 'nullable|string',
            'team_size' => 'nullable|string',
            'tags' => 'nullable|string',
            'completion_date' => 'nullable|date',
            'status' => 'required|string|in:active,inactive,draft',
            'is_featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('project_images', 'public');
        }

        // Process technologies as array
        if (!empty($data['technologies'])) {
            $data['technologies'] = array_map('trim', explode(',', $data['technologies']));
        }

        // Handle featured checkbox
        $data['is_featured'] = $request->has('is_featured');

        $project = Project::create($data);

        return redirect()->route('admin.project.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('backend.pages.project.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'client_name' => 'nullable|string|max:255',
            'project_url' => 'nullable|url',
            'technologies' => 'nullable|string',
            'duration' => 'nullable|string|max:255',
            'budget_range' => 'nullable|string',
            'team_size' => 'nullable|string',
            'tags' => 'nullable|string',
            'completion_date' => 'nullable|date',
            'status' => 'required|string|in:active,inactive,draft',
            'is_featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $data['image'] = $request->file('image')->store('project_images', 'public');
        }

        // Process technologies as array
        if (!empty($data['technologies'])) {
            $data['technologies'] = array_map('trim', explode(',', $data['technologies']));
        }

        // Handle featured checkbox
        $data['is_featured'] = $request->has('is_featured');

        $project->update($data);

        return redirect()->route('admin.project.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();
        return redirect()->route('admin.project.index')->with('success', 'Project deleted.');
    }
}
