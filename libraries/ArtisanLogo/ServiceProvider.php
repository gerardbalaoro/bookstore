<?php

namespace ArtisanLogo;

use Illuminate\Console\Application as Artisan;
use ArtisanLogo\FigletString;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->publishes([__DIR__ . '/config' => config_path('logo')], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/logo.php', 'logo');

        $config = $this->app['config'];
        if ($config->get('logo.enabled', false)) {
            Artisan::starting(
                function ($artisan) use ($config) {
                    $artisan->setName(
                        new FigletString($config->get('app.name'), $config->get('logo', []))
                    );
                }
            );
        }
    }
}