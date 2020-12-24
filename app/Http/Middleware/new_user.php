<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use \App\labs;

use Closure;


class new_user
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

        if (labs::where('username',$username)->get()->count() < 1) {
            return redirect('/dashboard/Setup1');
        }

        return $next($request);
    }
}
