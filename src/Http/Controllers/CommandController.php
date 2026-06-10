<?php
namespace RoshanDhungana\RouteCommands\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RoshanDhungana\RouteCommands\Services\CommandExecutor;

class CommandController extends Controller
{
    public function index()
    {
        return view('route-commands::index');
    }

    public function run(Request $request, CommandExecutor $executor)
    {
        $request->validate([
            'command' => 'required|string',
        ]);

        $output = $executor->run(
            $request->command,
            $request->options ?? []
        );

        return response()->json([
            'output' => $output
        ]);
    }
}