<?php

namespace Agungtri222\RajaOngkir\Providers;

use Illuminate\Support\Facades\App;
use Agungtri222\RajaOngkir\RajaOngkir;
use Illuminate\Support\ServiceProvider;

class RajaOngkirServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // merge package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/rajaongkir.php', 'rajaongkir');

        $this->app->singleton('RajaOngkir', function() {
            return true;
        });

        App::bind('RajaOngkir', function() {
            return new RajaOngkir;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/rajaongkir.php' => config_path('rajaongkir.php'),
        ], 'config');
    }
}
