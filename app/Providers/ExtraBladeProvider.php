<?php

namespace App\Providers;
use Auth, Blade;

use Illuminate\Support\ServiceProvider;

class ExtraBladeProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if("hasrole", function($expression){
            if(Auth::user()){
                if(Auth::user()->hasAnyRoles($expression)){
                    return true;
                }
                return false;
            }
            return false;
        });
    }
}
