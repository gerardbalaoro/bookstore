<?php

namespace App\Providers;

use App\Calibre\Filesystem;
use Illuminate\Support\ServiceProvider;

class CalibreServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Filesystem::class, function ($app) {
            $config = $app->config['calibre'];
            return new Filesystem($config);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Filesystem::class];
    }
}
