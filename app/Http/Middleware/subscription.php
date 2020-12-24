<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use \App\subscriptions as sbc;

use Closure;

class subscription
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
        $username = Auth::guard(null)->user()->username;

        $subscription  = sbc::where('username',$username)->get();

        if ($subscription->count() < 1) {
            return redirect('/dashboard/Setup2');
        }

        if (sbc::where(['username'=>$username,'subscription'=>'Trial 30 Days'])->get()->count() < 1) {
            return redirect('/dashboard/Setup2');
        }

       if ( sbc::where('username',$username)->orderBy('due_date','DESC')->first()->due_date < \Carbon\carbon::now())  {
                return redirect('/notification/subscription_expires');
       }
        


        return $next($request);
    }
}
