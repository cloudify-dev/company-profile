<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Service;

class FooterComposer
{
    /**
     */
    public function compose(View $view): void
    {
        $services = Cache::remember('services', 3600, function () {
            return Service::take(6)->get();
        });

        $view->with('services', $services);
    }
}
