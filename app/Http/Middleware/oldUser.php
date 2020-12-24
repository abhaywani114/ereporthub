<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use \App\labs;

use Closure;

class oldUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {
        $username = Auth::guard($guard)->user()->username;

        if (labs::where('username',$username)->get()->count() > 0) {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
