<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class AdminCheckMiddleware
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
        if(Auth::user()){
            if(Auth::user()->hasAnyRoles(['admin'])){
                return $next($request);
            }
            return abort(403);
        }
        return abort(401);
    }
}
