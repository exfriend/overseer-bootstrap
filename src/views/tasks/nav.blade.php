<template id="task-template">

    <h1>@{{ task.title }}
        <small>@{{ task.description }}</small>
    </h1>

    <h3>
        @lang('overseer::messages.controls')
    </h3>
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


<template id="task-list-template">
    <div v-for="task in tasks" class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-1">
                    <button @click="stop(task)" v-if="task.running" class="btn btn-default btn-lg">
                    <i class="fa fa-stop"></i>
                    </button>

                    <button @click="run(task)" v-if="!task.running" class="btn btn-default btn-lg">
                    <i class="fa fa-play"></i>
                    </button>

                </div>

                <div class="col-xs-9">
                        <span style="font-size: 20px;">
                            <a href="{{ url( 'tasks/task') }}?command=@{{ task.command }}">@{{ task.title ? task.title : task.command }}</a>
                        </span>
                    <button @click="unlock(task)" v-if="task.running" class="btn btn-link btn-xs text-danger">
                    <i class="fa fa-unlock-alt text-danger"></i>
                    @lang('overseer::messages.action_unlock')
                    </button>

                    </span>
                    <br>
                    <span class="help">@{{ task.description }}</span>
                </div>

                <div class="col-xs-2">
                    <span class="help-block">
                   <i class="fa fa-clock-o"></i> <span>@{{task.last_run}}</span> <br>
                    </span>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="progress" style=" margin-bottom:0px;margin-top:15px;">
                        <div class="data-progress progress-bar progress-bar-striped"
                             role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                             style="width:@{{task.progress}}%">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>


<template id="tasks-nav-list">

    <li class="dropdown tasks-menu">
        <!-- Menu Toggle Button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-flag-o"></i>
            <span class="label label-danger" v-if="tasks.length"> @{{ tasks.length }} </span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">Запущено задач: @{{ tasks.length }}</li>
            <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                    <li v-for="task in tasks"><!-- Task item -->
                        <a href="/tasks/task?command=@{{ task.command }}">
                            <!-- Task title and progress text -->
                            <h3>
                                @{{ task.title }}
                                <small class="pull-right">@{{ task.progress }}%</small>
                            </h3>
                            <!-- The progress bar -->
                            <div class="progress xs">
                                <!-- Change the css width attribute to simulate progress -->
                                <div class="progress-bar progress-bar-aqua"
                                     style="width: @{{ task.progress }}%"
                                     role="progressbar" aria-valuenow="@{{ task.progress }}" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">@{{ task.progress }}%</span>
                                </div>
                            </div>
                        </a>
                    </li><!-- end task item -->
                </ul>
            </li>
            <li class="footer">
                <a href="/tasks">Посмотреть все задачи</a>
            </li>
        </ul>
    </li>

</template>
