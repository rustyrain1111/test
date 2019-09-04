<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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

//    protected function authenticated(Request $request, $user)
//    {
//        if ($user->isAdmin()) {
//            return redirect()->route('admin.index');
//        }
//    }
}
