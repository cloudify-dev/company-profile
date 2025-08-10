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
        $status = $request->get('status');

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

        if ($status !== null) {
            $query->where('is_active', $status === 'active');
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
            'client' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'demo_url' => 'nullable|url',
            'completion_date' => 'nullable|date',
            'challenges' => 'nullable|string',
            'challenge_image' => 'nullable|image|max:2048',
            'challenge_points' => 'nullable|array',
            'challenge_points.*' => 'nullable|string',
            'results' => 'nullable|string',
            'result_images' => 'nullable|array',
            'result_images.*' => 'nullable|image|max:2048',
            'brochure_pdf' => 'nullable|file|mimes:pdf|max:10240',
            'brochure_doc' => 'nullable|file|mimes:doc,docx|max:10240',
            'help_banner_image' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        // Handle main image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('project_images', 'public');
        }

        // Handle challenge image upload
        if ($request->hasFile('challenge_image')) {
            $data['challenge_image'] = $request->file('challenge_image')->store('project_images', 'public');
        }

        // Handle result images upload
        if ($request->hasFile('result_images')) {
            $resultImages = [];
            foreach ($request->file('result_images') as $file) {
                $resultImages[] = $file->store('project_images', 'public');
            }
            $data['result_images'] = $resultImages;
        }

        // Handle brochure PDF upload
        if ($request->hasFile('brochure_pdf')) {
            $data['brochure_pdf'] = $request->file('brochure_pdf')->store('project_brochures', 'public');
        }

        // Handle brochure DOC upload
        if ($request->hasFile('brochure_doc')) {
            $data['brochure_doc'] = $request->file('brochure_doc')->store('project_brochures', 'public');
        }

        // Handle help banner image upload
        if ($request->hasFile('help_banner_image')) {
            $data['help_banner_image'] = $request->file('help_banner_image')->store('project_images', 'public');
        }

        // Filter out empty challenge points
        if (isset($data['challenge_points'])) {
            $data['challenge_points'] = array_filter($data['challenge_points'], function($point) {
                return !empty(trim($point));
            });
            $data['challenge_points'] = array_values($data['challenge_points']); // Re-index array
        }

        $data['is_active'] = $request->has('is_active') && $request->is_active == '1';
        $data['sort_order'] = $data['sort_order'] ?? 0;

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
            'client' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'demo_url' => 'nullable|url',
            'completion_date' => 'nullable|date',
            'challenges' => 'nullable|string',
            'challenge_image' => 'nullable|image|max:2048',
            'challenge_points' => 'nullable|array',
            'challenge_points.*' => 'nullable|string',
            'results' => 'nullable|string',
            'result_images' => 'nullable|array',
            'result_images.*' => 'nullable|image|max:2048',
            'brochure_pdf' => 'nullable|file|mimes:pdf|max:10240',
            'brochure_doc' => 'nullable|file|mimes:doc,docx|max:10240',
            'help_banner_image' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        // Handle main image upload
        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $data['image'] = $request->file('image')->store('project_images', 'public');
        }

        // Handle challenge image upload
        if ($request->hasFile('challenge_image')) {
            if ($project->challenge_image) {
                Storage::disk('public')->delete($project->challenge_image);
            }
            $data['challenge_image'] = $request->file('challenge_image')->store('project_images', 'public');
        }

        // Handle result images upload
        if ($request->hasFile('result_images')) {
            // Delete old result images
            if ($project->result_images) {
                foreach ($project->result_images as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
            
            $resultImages = [];
            foreach ($request->file('result_images') as $file) {
                $resultImages[] = $file->store('project_images', 'public');
            }
            $data['result_images'] = $resultImages;
        }

        // Handle brochure PDF upload
        if ($request->hasFile('brochure_pdf')) {
            if ($project->brochure_pdf) {
                Storage::disk('public')->delete($project->brochure_pdf);
            }
            $data['brochure_pdf'] = $request->file('brochure_pdf')->store('project_brochures', 'public');
        }

        // Handle brochure DOC upload
        if ($request->hasFile('brochure_doc')) {
            if ($project->brochure_doc) {
                Storage::disk('public')->delete($project->brochure_doc);
            }
            $data['brochure_doc'] = $request->file('brochure_doc')->store('project_brochures', 'public');
        }

        // Handle help banner image upload
        if ($request->hasFile('help_banner_image')) {
            if ($project->help_banner_image) {
                Storage::disk('public')->delete($project->help_banner_image);
            }
            $data['help_banner_image'] = $request->file('help_banner_image')->store('project_images', 'public');
        }

        // Filter out empty challenge points
        if (isset($data['challenge_points'])) {
            $data['challenge_points'] = array_filter($data['challenge_points'], function($point) {
                return !empty(trim($point));
            });
            $data['challenge_points'] = array_values($data['challenge_points']); // Re-index array
        }

        $data['is_active'] = $request->has('is_active') && $request->is_active == '1';
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $project->update($data);

        return redirect()->route('admin.project.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        // Delete main image
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        
        // Delete challenge image
        if ($project->challenge_image) {
            Storage::disk('public')->delete($project->challenge_image);
        }
        
        // Delete result images
        if ($project->result_images) {
            foreach ($project->result_images as $resultImage) {
                Storage::disk('public')->delete($resultImage);
            }
        }
        
        $project->delete();
        return redirect()->route('admin.project.index')->with('success', 'Project deleted.');
    }
}
