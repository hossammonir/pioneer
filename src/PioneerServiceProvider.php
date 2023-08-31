<?php

namespace HossamMonir\Pioneer;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
class PioneerServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register a class in the service container
        $this->app->singleton('Pioneer', function () {
            return new PioneerServices();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Unifonic services config to the application config
        $this->publishes([
            __DIR__.'/config/pioneer.php' => config_path('pioneer.php'),
        ]);

        $loader = AliasLoader::getInstance();
        $loader->alias('Pioneer', 'HossamMonir\\Pioneer\\Facades\\Pioneer');
    }
}
