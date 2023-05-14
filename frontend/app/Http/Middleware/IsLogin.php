<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class IsLogin
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
        if(Session::has('user')) {
            return $next($request);
        }

        Session::flash('message', "Silahkan login!");
        Session::flash('alert-class', "info");
        return redirect()->route('auth.login');
    }
}
