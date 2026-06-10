<?php
namespace RoshanDhungana\RouteCommands\Services;

use Illuminate\Support\Facades\Artisan;

class CommandExecutor
{
    public function run(string $command, array $parameters = [])
    {
        Artisan::call($command, $parameters);

        return Artisan::output();
    }
}