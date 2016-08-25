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
}
