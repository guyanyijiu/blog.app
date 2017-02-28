<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class Admin
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
        $routeName = Route::currentRouteName();
        if($routeName != 'admin.index' && ! $request->user()->can($routeName)){
            return redirect('/admin')->withErrors('无权限');
        }
        return $next($request);
    }
}
