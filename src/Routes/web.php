<?php 
use Illuminate\Support\Facades\Route;
use RoshanDhungana\RouteCommands\Http\Controllers\DashboardController;

Route::middleware(['web'])->group(function () {
    Route::get('roshan/route-commands', [DashboardController::class, 'index'])
        ->name('route-commands.index');
});