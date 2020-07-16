<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Myclass\MyClass;

class MyProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('myclass', function(){
            return new MyClass('my Provider');
            //return 'Hello...';
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
