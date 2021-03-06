<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserActivation
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
        if (in_array($request->route()->getName(), ['user.profile', 'user.profile.update']))
        {
            return $next($request);
        }

        if(!auth()->guard('user')->user()->activation)
        {
            return redirect()->route('user.home');
        }

        return $next($request);
    }
}
