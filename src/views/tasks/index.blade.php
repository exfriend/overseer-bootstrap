@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tasks</h3>
            </div>
            <div class="box-body table-responsive">

                <task-list></task-list>


            </div>
        </div>

    </div>
@endsection

@section('scripts')
    @parent

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
                            unlock
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

    <script src="/vuejs/vue.js"></script>
    <script src="/vuejs/vue-resource.min.js"></script>
    <script src="/vendor/overseer-bootstrap/overseer.js"></script>

    <script>

        new Vue({
            'el': 'body',
        });

    </script>

@endsection