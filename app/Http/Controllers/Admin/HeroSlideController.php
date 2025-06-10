<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroSlide;
use Illuminate\Support\Facades\Storage;

class HeroSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slides = HeroSlide::all();
        return view('backend.pages.hero', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.hero.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'subtitle' => 'required|string',
            'title_1' => 'required|string',
            'title_2' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('hero_images', 'public');
        }

        HeroSlide::create($data);

        return redirect()->route('admin.hero.index')->with('success', 'Slide created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeroSlide $hero)
    {
        return view('backend.pages.hero.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HeroSlide $hero)
    {
        $data = $request->validate([
            'subtitle' => 'required|string',
            'title_1' => 'required|string',
            'title_2' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($hero->image) {
                Storage::disk('public')->delete($hero->image);
            }
            $data['image'] = $request->file('image')->store('hero_images', 'public');
        }

        $hero->update($data);
        return redirect()->route('admin.hero.index')->with('success', 'Slide updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeroSlide $hero)
    {
        if ($hero->image) {
            Storage::disk('public')->delete($hero->image);
        }

        $hero->delete();
        return redirect()->route('admin.hero.index')->with('success', 'Slide deleted.');
    }
}
