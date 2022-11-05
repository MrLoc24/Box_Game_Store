<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUpdateUserPassword
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
            'current_password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
        return $next($request);
    }
}
