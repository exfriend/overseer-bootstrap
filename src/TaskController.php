<?php

namespace Exfriend\OverseerBootstrap;

use Exfriend\Overseer\CommandManager;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TaskController extends Controller
{
    public function index()
    {
        return view( 'overseer-bootstrap::tasks.index' );
    }

    public function task( Request $request )
    {
        return view( 'overseer-bootstrap::tasks.task', [ 'task' => ( new CommandManager( $request->command ) ) ] );
    }

    public function log( Request $request )
    {
        $commandManager = new CommandManager( $request->command );
        $log_data = implode( '', $commandManager->getLogByName( $request->filename ) );


        return view( 'overseer-bootstrap::tasks.log', [
            'task' => $commandManager,
            'log_data' => $log_data,
        ] );
    }
}
