<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('backend.pages.team.index', compact('teams'));
    }

    public function create()
    {
        return view('backend.pages.team.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'position' => 'required|string',
            'bio' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'availability' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer'
        ]);

        $data['is_active'] = $request->has('is_active') && $request->is_active == '1';
        $data['sort_order'] = $data['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('team_images', 'public');
        }

        Team::create($data);

        return redirect()->route('admin.team.index')->with('success', 'Team member created successfully.');
    }

    public function edit(Team $team)
    {
        return view('backend.pages.team.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'position' => 'required|string',
            'bio' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'availability' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer'
        ]);

        $data['is_active'] = $request->has('is_active') && $request->is_active == '1';
        $data['sort_order'] = $data['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            if ($team->image) {
                Storage::disk('public')->delete($team->image);
            }
            $data['image'] = $request->file('image')->store('team_images', 'public');
        }

        $team->update($data);

        return redirect()->route('admin.team.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(Team $team)
    {
        if ($team->image) {
            Storage::disk('public')->delete($team->image);
        }

        $team->delete();

        return redirect()->route('admin.team.index')->with('success', 'Team member deleted successfully.');
    }
}
