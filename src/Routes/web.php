<?php
use Illuminate\Support\Facades\Route;
use RoshanDhungana\RouteCommands\Http\Controllers\CommandController;

Route::middleware(['web'])
    ->prefix('route-commands')
    ->group(function () {

        Route::get('/', [CommandController::class, 'index']);
        Route::post('/run', [CommandController::class, 'run']);

    });