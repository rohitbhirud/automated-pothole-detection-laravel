<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfEngineer
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
        if ( $request->user()->hasRole('engineer') ) {
            return redirect('mod/');
        }

        return $next($request);
    }
}
