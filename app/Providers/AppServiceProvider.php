<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use App\Managements\EventManagement;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('EventManagement', function(){
            return new EventManagement;
        });
    }
}
