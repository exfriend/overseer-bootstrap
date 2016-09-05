@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="clearfix"></div>
        <div class="panel panel-default">
            <div class="panel-body">
                <task command="{{ get_class( $task->command() ) }}"></task>
            </div>
        </div>

    </div>
@endsection
