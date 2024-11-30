<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckIfVerifiedEmail
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
        if ((Auth::check() && Auth::user()->hasVerifiedEmail()) ||
            (Auth::check() && Auth::user()->email === null)) {
            return redirect()->route('dashboard.pengguna');
        }

        return $next($request);
    }
}
