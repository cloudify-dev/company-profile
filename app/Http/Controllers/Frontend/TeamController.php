<?php


namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageSetting;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::latest()->where('is_active', true)->orderBy('sort_order')->get();
        $pageSettings = PageSetting::where('page_name', 'team')->first();
        return view('frontend.pages.team', compact('teams', 'pageSettings'));
    }

    public function show($id)
    {
        $team = Team::findOrFail($id);
        $pageSettings = \App\Models\PageSetting::where('page_name', 'team')->first();

        return view('frontend.pages.team-details', compact('team', 'pageSettings'));
    }
}
