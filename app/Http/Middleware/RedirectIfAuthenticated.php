<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'user') {
            return redirect() -> route('dashboard.pengguna');
        }
        if (Auth::check() && Auth::user()->role === 'operator') {
            return redirect() -> route('dashboard.operator');
        }
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect() -> route('dashboard.admin');
        }

        return $next($request);
    }
}
