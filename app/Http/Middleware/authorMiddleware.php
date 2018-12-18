<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class authorMiddleware
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
        if ( !Auth::user()->isAuthor()  and !Auth::user()->isEditor() and !Auth::user()->isAdmin()){
            return redirect('/');
        }
        return $next($request);
    }

}
