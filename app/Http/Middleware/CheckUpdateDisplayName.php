<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUpdateDisplayName
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
            'new_displayname' => 'bail|required|min:3|max:15|string|unique:users,userID|confirmed|regex:/^\S{3,15}$/',
            'new_displayname_confirmation' => 'required',
            'agree' => 'required',
        ]);
        return $next($request);
    }
}
