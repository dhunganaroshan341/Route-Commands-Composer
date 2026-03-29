<?php  
namespace RoshanDhungana\RouteCommands;

use Illuminate\Support\ServiceProvider;

class RouteCommandsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load package routes
        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');

        // Load views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'route-commands');
    }

    public function register()
    {
        //
    }
}