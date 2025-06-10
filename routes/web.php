<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Models\Service;
use App\Models\HeroSlide;
use App\Models\Team;
use App\Models\PageSetting;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Frontend\TeamController as FrontendTeamController;

// LANDING PAGE (INERTIA DEFAULT)
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// INERTIA DASHBOARD
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// PROFILE
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// FRONTEND
Route::get('/frontend', function () {
    return view('frontend.index');
});

Route::get('/frontend/about', function () {
    return view('frontend.about');
});

// HALAMAN INDEX UTAMA (DINAMIS)

Route::get('/index', function () {
    $slides = HeroSlide::all();
    $services = Service::take(6)->get();
    $teams = Team::latest()->take(8)->get();
    $projects = \App\Models\Project::latest()->take(9)->get(); // ambil max 9 project
    return view('frontend.pages.index', compact('slides', 'services', 'teams', 'projects'));
});


// PROJECT (FRONTEND)
Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
Route::get('/project/{id}', [ProjectController::class, 'details'])->name('project.details');

// SERVICE (FRONTEND)
Route::get('/service', function () {
    $services = Service::all();
    $pageSettings = PageSetting::where('page_name', 'service')->first();
    return view('frontend.pages.service', compact('services', 'pageSettings'));
})->name('services.list');

Route::get('/service-details/{id}', function ($id) {
    $service = Service::with(['features', 'benefits', 'faqs'])->findOrFail($id);
    $pageSettings = PageSetting::where('page_name', 'service')->first();
    return view('frontend.pages.service-details', compact('service', 'pageSettings'));
})->name('service.details');

// TEAM (FRONTEND)
Route::get('/team', [FrontendTeamController::class, 'index'])->name('frontend.team.index');
Route::get('/team-details', function () {
    return view('frontend.pages.team-details');
});
Route::get('/team-details/{id}', [FrontendTeamController::class, 'show'])->name('frontend.team.details');

// BACKEND DASHBOARD
Route::get('/dashboard', function () {
    return view('backend.pages.dashboard');
});

Route::get('/pages/tables', function () {
    return view('backend.pages.tables');
});

Route::get('/login', function () {
    return view('backend.login');
});

// CRUD BACKEND
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('hero', \App\Http\Controllers\Admin\HeroSlideController::class);
    Route::resource('service', \App\Http\Controllers\Admin\ServiceController::class);
    Route::resource('project', \App\Http\Controllers\Admin\ProjectController::class);
    Route::resource('team', \App\Http\Controllers\Admin\TeamController::class);
    Route::resource('breadcrumb', \App\Http\Controllers\Admin\BreadcrumbController::class);
});
