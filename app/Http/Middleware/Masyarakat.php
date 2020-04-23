<?php

namespace App\Http\Middleware;

use Closure;

class Masyarakat
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
        if (auth()->user()->level === 'masyarakat') {
            return $next($request);
        } else {
            return redirect()->back();
        }   
    }
}
