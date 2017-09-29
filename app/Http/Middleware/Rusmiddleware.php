<?php

namespace App\Http\Middleware;

use Closure;

class Rusmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $route_param)
    {
        if ($request->route('page') != 'pages' && $route_param == 'admin') {
            echo 'set';
            return redirect()->route('home');
        }
        return next($request);
    }
}
