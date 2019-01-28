<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Personal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 'personal') {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->role == 'director') {
            return redirect('/director');
        }
        else {
            return redirect('/');
        }
    }
}
