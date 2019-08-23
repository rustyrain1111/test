<?php

namespace App\Http\Middleware;

use Closure;

class CheckBanedUser
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
        if ($this->is_block($request)) {
            return redirect()->route('welcome');
        }
        return $next($request);
    }

    protected function is_block($request)
    {
        return (bool)$request->user()->is_block;
    }
}
