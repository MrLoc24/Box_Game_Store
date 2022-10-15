<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

date_default_timezone_set("Asia/Bangkok");

class checkAdminLoginMiddleware
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
        if ($request->session()->has('admin')) {
            return $next($request);
        }
        return redirect('admin');
    }
}