<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    /**
     * Display a listing of achievements
     */
    public function index()
    {
        $achievements = Achievement::ordered()->get();
        return view('backend.pages.achievements.index', compact('achievements'));
    }

    /**
     * Show the form for creating a new achievement
     */
    public function create()
    {
        return view('backend.pages.achievements.create');
    }

    /**
     * Store a newly created achievement
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'achievement_value' => 'required|string|max:125',
            'achievement_unit' => 'required|string|max:125',
            'achievement_description' => 'required|string|max:125',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if (!isset($data['sort_order'])) {
            $data['sort_order'] = Achievement::max('sort_order') + 1;
        }

        $data['is_active'] = $request->has('is_active');

        Achievement::create($data);

        return redirect()->route('admin.achievements.index')->with('swal', [
            'title' => 'Success!',
            'text' => 'Achievement created successfully!',
            'icon' => 'success'
        ]);
    }

    /**
     * Show form to edit an achievement
     */
    public function edit(Achievement $achievement)
    {
        return view('backend.pages.achievements.edit', compact('achievement'));
    }

    /**
     * Update an achievement
     */
    public function update(Request $request, Achievement $achievement)
    {
        $data = $request->validate([
            'achievement_value' => 'required|string|max:125',
            'achievement_unit' => 'required|string|max:125',
            'achievement_description' => 'required|string|max:125',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $achievement->update($data);

        return redirect()->route('admin.achievements.index')->with('swal', [
            'title' => 'Success!',
            'text' => 'Achievement updated successfully!',
            'icon' => 'success'
        ]);
    }

    /**
     * Delete an achievement
     */
    public function destroy(Achievement $achievement)
    {
        $achievement->delete();

        return redirect()->route('admin.achievements.index')->with('swal', [
            'title' => 'Deleted!',
            'text' => 'Achievement deleted successfully!',
            'icon' => 'success'
        ]);
    }

    /**
     * Toggle achievement active status
     */
    public function toggle(Achievement $achievement)
    {
        $achievement->is_active = !$achievement->is_active;
        $achievement->save();

        return back()->with('swal', [
            'title' => 'Success!',
            'text' => $achievement->is_active ? 'Achievement activated successfully!' : 'Achievement deactivated successfully!',
            'icon' => 'success'
        ]);
    }
}
