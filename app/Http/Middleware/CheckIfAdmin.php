<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfAdmin
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
        if (!auth()->check()) {
            return redirect('login');
        }
        if (!auth()->user()->isAdmin()) {
            return redirect()->back();
        }
        if (auth()->user()->isAdmin()) {
            return $next($request);
        }

        return redirect()->back();
    }
}
