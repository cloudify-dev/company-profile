<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Models\Service;
use App\Models\HeroSlide;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\PageSetting;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Frontend\TeamController as FrontendTeamController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\AboutController;
use App\Models\AboutUsPage;

// LANDING PAGE (INERTIA DEFAULT)
// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

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

// Route::get('/frontend/about', function () {
//     $teams = Team::latest()->take(8)->get();
//     return view('frontend.pages.about', compact('teams'));
// });

// HALAMAN INDEX UTAMA (DINAMIS)

// Route::get('/index', function () {
//     $slides = HeroSlide::all();
//     $services = Service::take(6)->get();
//     $teams = Team::latest()->take(8)->get();
//     $projects = \App\Models\Project::latest()->take(9)->get(); // ambil max 9 project
//     return view('frontend.pages.index', compact('slides', 'services', 'teams', 'projects'));
// });

Route::get('/', function () {
    $slides = HeroSlide::all();
    $services = Service::take(6)->get();
    $about = AboutUsPage::where('is_active', true)->first();
    $teams = Team::latest()->take(8)->get();
    $projects = \App\Models\Project::latest()->take(9)->get(); // ambil max 9 project
    $achievements = \App\Models\Achievement::where('is_active', true)->ordered()->get(); // independent achievements
    return view('frontend.pages.index', compact('slides', 'services', 'teams', 'projects', 'about', 'achievements'));
});

// ABOUT (FRONTEND)
Route::get('/service', [ServiceController::class, 'index'])->name('service');
Route::get('/about', [AboutController::class, 'index'])->name('about');

// PROJECT (FRONTEND)
Route::get('/project', [ProjectController::class, 'index'])->name('project');
Route::get('/project/{id}', [ProjectController::class, 'details'])->name('project.details');

// SERVICE (FRONTEND)
Route::get('/service', [ServiceController::class, 'index'])->name('services.list');

Route::get('/service-details/{id}', [ServiceController::class, 'show'])->name('service.details');

// TEAM (FRONTEND)
Route::get('/team', [FrontendTeamController::class, 'index'])->name('frontend.team');
Route::get('/team/{id}', [FrontendTeamController::class, 'show'])->name('frontend.team.details');

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
    Route::controller(\App\Http\Controllers\Admin\ServiceController::class)->group(function () {
        Route::get('service-page-settings', 'pageSettings')->name('service.page-settings');
        Route::put('service-page-settings', 'updatePageSettings')->name('service.page-settings.update');
    });
    Route::resource('project', \App\Http\Controllers\Admin\ProjectController::class);
    Route::resource('team', \App\Http\Controllers\Admin\TeamController::class);
    Route::resource('testimonial', \App\Http\Controllers\Admin\TestimonialController::class);
    Route::resource('breadcrumb', \App\Http\Controllers\Admin\BreadcrumbController::class);
    Route::resource('about', \App\Http\Controllers\Admin\AboutController::class);
    Route::resource('section-titles', \App\Http\Controllers\Admin\SectionTitleController::class);
    Route::controller(\App\Http\Controllers\Admin\SectionTitleController::class)->group(function () {
        Route::patch('section-titles/{sectionTitle}/toggle', 'toggle')->name('section-titles.toggle');
    });
    Route::controller(\App\Http\Controllers\Admin\AboutController::class)->group(function () {
        Route::patch('about/{about}/toggle', 'toggle')->name('about.toggle');
        // About Features Routes
        Route::get('about/{about}/features', 'features')->name('about.features');
        Route::get('about/{about}/features/create', 'createFeature')->name('about.features.create');
        Route::post('about/{about}/features', 'storeFeature')->name('about.features.store');
        Route::get('about/{about}/features/{feature}/edit', 'editFeature')->name('about.features.edit');
        Route::put('about/{about}/features/{feature}', 'updateFeature')->name('about.features.update');
        Route::delete('about/{about}/features/{feature}', 'destroyFeature')->name('about.features.destroy');
        Route::patch('about/{about}/features/{feature}/toggle', 'toggleFeature')->name('about.features.toggle');
    });

    // Independent Achievement routes
    Route::resource('achievements', \App\Http\Controllers\Admin\AchievementController::class);
    Route::controller(\App\Http\Controllers\Admin\AchievementController::class)->group(function () {
        Route::patch('achievements/{achievement}/toggle', 'toggle')->name('achievements.toggle');
    });
});
