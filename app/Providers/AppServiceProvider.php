<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    //Schema::defaultStringLength(191); // para cambiar la longitud del parámetro varchar, en caso de que esté trabajando con una versión desactualizada del MySQL
    }
    
}
