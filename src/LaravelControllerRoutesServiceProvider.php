<?php

namespace sdavis1902\LaravelControllerRoutes;

use Illuminate\Support\ServiceProvider;

class LaravelControllerRoutesServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        \App::bind('moreroute', function(){
            return new \sdavis1902\LaravelControllerRoutes\MoreRoute;
        });
    }
}
