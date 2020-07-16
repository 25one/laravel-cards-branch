<?php

namespace App\Http\Middleware\ViewShare;

use App\Models\User;
//use App\Providers\AppServiceProvider;
use Closure;

class AdminLayoutMiddleware
{
    /**
     * @return array
     */
    public function getAdminMenu()
    {
        return [
            [
                'name' => 'Dashboard',
                'url' => '/dashboard'
            ], 
            [
                'name' => 'Logout',
                'url' => '/logout'
            ], 

        ];
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //view()->share('viewLayout', 'admin');

        if (auth()->user()) {
            switch (auth()->user()->role) {
                case 'admin':
                    //$list = array_merge(
                        //$this->getAdminMenu(),
                        //AppServiceProvider::getMenuConfigs()
                    //);
                    $list = $this->getAdminMenu();
                    view()->share('menuItems', $list);
                    break;
                default:
                    view()->share('menuItems', []);
            }
        }

        return $next($request);
    }
}
