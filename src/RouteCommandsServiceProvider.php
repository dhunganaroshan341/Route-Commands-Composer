<?php
namespace RoshanDhungana\RouteCommands;

use Illuminate\Support\ServiceProvider;

class RouteCommandsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        // Load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'route-commands');

        // Publish config (later)
        $this->publishes([
            __DIR__.'/../config/route-commands.php' => config_path('route-commands.php'),
        ], 'route-commands-config');
    }

    public function register()
    {
        //
    }
}