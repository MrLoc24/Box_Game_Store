<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUpdatePayment
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
            'card_number' => 'bail|required',
            'expiration' => 'bail|required',
            'cvv' => 'required|max:3',
        ]);
        return $next($request);
    }
}
