<?php


Route::group( [ 'middleware' => [ 'web', 'auth' ] ], function ()
{
    Route::get( 'tasks', [ 'as' => 'tasks.index', 'uses' => 'Exfriend\OverseerBootstrap\TaskController@index', ] );
    Route::get( 'tasks/task', [ 'as' => 'tasks.task', 'uses' => 'Exfriend\OverseerBootstrap\TaskController@task', ] );
    Route::get( 'tasks/log', [ 'as' => 'tasks.log', 'uses' => 'Exfriend\OverseerBootstrap\TaskController@log', ] );

} );
