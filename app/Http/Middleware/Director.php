<?php

namespace App\Http\Middleware;

use Closure;
use Auth ;

class Director
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
        //dd(Auth::user()->role);
        if (Auth::check() && Auth::user()->role == 'director') {
            //dd(Auth::user()->role);
            //return redirect()->route('/director');
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->role == 'personal') {
            return redirect('/personal');
        }
        else {
            return redirect('/');
        }
    }
}
