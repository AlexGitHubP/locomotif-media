<?php

namespace Locomotif\Media;

use Illuminate\Support\ServiceProvider;

class MediaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Locomotif\Media\Controller\MediaController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/Routes/routes.php');
        $this->loadViewsFrom(__DIR__.'/views', 'media');
        
        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');

        $this->publishes([
            __DIR__.'/views' => resource_path('views/locomotif/media'),
        ]);
        
    }
}
