<?php namespace RoshanDhungana\RouteCommands\Http\Controllers;

use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('route-commands::index');
    }
}