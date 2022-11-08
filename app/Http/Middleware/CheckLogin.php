<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $request->validate([
            'display_name' => 'bail|required|min:3|max:15|string|regex:/^\S{3,15}$/',
            'password' => 'required|min:8|max:15|regex:/^(?=.*[A-Za-z])(?=.*\d)(?!.*\s)[A-Za-z\d]{8,15}$/',
        ]);
        
        return $next($request);
    }
}
