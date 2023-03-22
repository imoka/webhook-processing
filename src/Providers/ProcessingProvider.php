<?php

namespace Moka\ProcessingSync\Providers;

use Illuminate\Support\ServiceProvider;

class ProcessingProvider extends ServiceProvider
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
        $this->loadRoutesFrom(__DIR__ . '/../routes/processing.php');

        $this->publishes([
            __DIR__ . '/../Http/Controllers' => base_path() . DIRECTORY_SEPARATOR . 'app/Http/Controllers/Api/Webhooks/Processing'
        ], 'processing-publish');

        $this->publishes([
            __DIR__.'/../config/processing.php' => config_path('processing.php'),
        ], 'processing-publish');
    }
}
