<?php

namespace App\Http\Middleware;

use Closure;

class RbacAuth
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
//        route('system','',false) ;
        $route = \Route::current() ;
        //var_dump($route) ;
        $action = \Route::currentRouteAction() ;
        //var_dump($action) ;
//        return false ;
        return $next($request);
    }
}
