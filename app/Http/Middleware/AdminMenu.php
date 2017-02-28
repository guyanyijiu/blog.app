<?php

namespace App\Http\Middleware;

use App\models\Permission;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class AdminMenu
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
        View::share('menuData', $this->getMenu());
        return $next($request);
    }

    public function getMenu(){

        $current = ['id' => null, 'pid' => null];
        $currentRouteName = Route::currentRouteName();
        $currentRouteName = explode('.', $currentRouteName);
        $currentRouteName = $currentRouteName[0] . '.index';

        $menu = [];
        $permissions = Permission::where('pid', 0)->orWhere('name', 'like', '%.index')->get()->toArray();
        foreach($permissions as $permission){
            if($permission['pid'] == 0 || Auth::user()->can($permission['name'])){
                $menu[] = $permission;
                if($currentRouteName == $permission['name']){
                    $current['id'] = $permission['id'];
                    $current['pid'] = $permission['pid'];
                }
            }
        }
        $menu = getTree($menu);

        return ['menus' => $menu, 'current' => $current];
    }
}
