<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRegister
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
            'name' => 'required|string',
            'display_name' => 'bail|required|min:3|max:15|string|unique:users,userID|regex:/^\S{3,15}$/',
            'email' => 'required|string|email:filter|max:255|unique:users',
            'password' => 'required|min:8|max:15|confirmed|regex:/^(?=.*[A-Za-z])(?=.*\d)(?!.*\s)[A-Za-z\d]{8,15}$/',
            'password_confirmation' => 'required',
            'receive_news' => 'required',
            'terms_of_service' => 'required',
        ]);

        return $next($request);
    }
}
