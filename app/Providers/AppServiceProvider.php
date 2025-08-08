<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
        
        // Register view composers
        View::composer('frontend.partials.footer', \App\Http\ViewComposers\FooterComposer::class);
        
        // Use custom pagination view
        Paginator::defaultView('custom.pagination');
        Paginator::defaultSimpleView('custom.pagination');
    }
}
