<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkAdminLogoutMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('admin') || $request->session()->has('boss')) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}