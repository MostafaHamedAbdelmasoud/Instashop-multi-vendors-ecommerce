<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class DashboardLocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        app()->setLocale(
            Session::get(
                'locale',
                $request->get('language', app()->getLocale())
            )
        );

        return $next($request);
    }
}
