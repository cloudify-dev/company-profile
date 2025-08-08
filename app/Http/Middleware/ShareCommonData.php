<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;
use App\Models\Service;

class ShareCommonData
{
    public function handle(Request $request, Closure $next): Response
    {
        View::share('services', Service::take(6)->get());
            
        return $next($request);
    }
}
