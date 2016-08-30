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

@section('scripts')
    @parent

    <template id="task-template">

        <h1>@{{ task.title }}
            <small>@{{ task.description }}</small>
        </h1>


        <h3symotion-next
        )>
        @lang('overseer::messages.controls')
        </h3symotion-next>
        <hr>

        <button @click="run()" v-if="!task.running" class="btn btn-default"><i class="fa fa-play"></i>
        @lang('overseer::messages.action_run')
        </button>
        <button @click="stop()" v-if="task.running" class="btn btn-default"><i class="fa fa-stop"></i>
        @lang('overseer::messages.action_stop')
        </button>
        <button @click="unlock()" v-if="task.running" class="btn btn-danger"><i class="fa fa-unlock-alt"></i>
        @lang('overseer::messages.action_unlock')
        </button>


        <br><br>

        <div class="progress">
            <div style="width: @{{ task.progress }}%;" class="data-progress progress-bar progress-bar-danger"
                 role="progressbar"></div>
        </div>

        <h3>
            @lang('overseer::messages.log')
        </h3>
        <hr>

        <div class="panel panel-default">
            <div class="data-log panel-body"
                 style="font-family: monospace; background:#222; color: #fff; max-height: 500px; overflow-y: scroll"
            >
                {{--@{{ task.short_log }}--}}

                <p v-for="line in task.short_log"> @{{ line }} </p>

                <p v-if="!task.short_log.length"> @lang('overseer::messages.empty_log') </p>

            </div>
        </div>

        <br>
        <br>

        <h3>@lang('overseer::messages.history')
            <small>@lang('overseer::messages.past_runs')</small>
        </h3>
        <hr>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>@lang('overseer::messages.date') </th>
                <th>@lang('overseer::messages.event')</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="log in task.logs">
                <td>@{{ log }}</td>
                <td>
                    <a href="/tasks/log?command=@{{ task.command }}&filename=@{{ log }}"> @lang('overseer::messages.view_log')  </a>
                </td>
            </tr>
            <tr class="bg-warning" v-if="!task.logs.length">
                <td colspan="8" style="text-align: center">@lang('overseer::messages.no_runs') </td>
            </tr>

            </tbody>
        </table>

    </template>

    <script src="/vuejs/vue.js"></script>
    <script src="/vuejs/vue-resource.min.js"></script>
    <script src="/vendor/overseer-bootstrap/overseer.js"></script>

    <script>

        new Vue({
            'el': 'body',
        });

    </script>

@endsection