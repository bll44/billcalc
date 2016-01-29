<?php

namespace App\Http\Middleware;

use Closure;

class VenmoAuth
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
        if( ! session()->get('is_logged_in'))
            return redirect('/home/calc');

        return $next($request);
    }
}
