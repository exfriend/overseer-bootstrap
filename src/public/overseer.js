Vue.component('task', {
    ready: function () {
        this.fetchTask();
        setInterval(this.fetchTask, 2000);
    },
    methods: {
        fetchTask: function () {
            this.$http.get('/overseer/api/command?command=' + this.command).then(function (response) {
                this.task = response.json().data;
            })
        },
        run: function () {
            this.$http.get('/overseer/api/run?command=' + this.task.command).then(function (response) {
            })
        },
        stop: function () {
            this.$http.get('/overseer/api/stop?command=' + this.task.command).then(function (response) {
            })
        },
        unlock: function () {
            this.$http.get('/overseer/api/unlock?command=' + this.task.command).then(function (response) {
            })
        }
    },
    props: ['command'],
    data: function () {
        return {
            task: [],
        };
    },
    template: '#task-template'
});


Vue.component('task-list', {
    ready: function () {
        this.fetchTasks();
        setInterval(this.fetchTasks, 2000);
    },
    methods: {
        fetchTasks: function () {
            this.$http.get('/overseer/api/commands').then(function (response) {
                this.tasks = response.json().data;
            })
        },
        run: function (task) {
            this.$http.get('/overseer/api/run?command=' + task.command).then(function (response) {
            })
        },
        stop: function (task) {
            this.$http.get('/overseer/api/stop?command=' + task.command).then(function (response) {
            })
        },
        unlock: function (task) {
            this.$http.get('/overseer/api/unlock?command=' + task.command).then(function (response) {
            })
        }
    },
    data: function () {
        return {
            tasks: []
        };
    },
    template: '#task-list-template'
});

Vue.component('tasks-nav-list', {
    ready: function () {
        this.fetchTasks();
        setInterval(this.fetchTasks, 2000);
    },
    methods: {
        fetchTasks: function () {
            this.$http.get('/overseer/api/commands').then(function (response) {
                this.tasks = response.json().data.filter(function (task) {
                    return task.running;
                });
                console.log(this.tasks);
            })
        },
        run: function (task) {
            this.$http.get('/overseer/api/run?command=' + task.command).then(function (response) {
            })
        },
        stop: function (task) {
            this.$http.get('/overseer/api/stop?command=' + task.command).then(function (response) {
            })
        },
        unlock: function (task) {
            this.$http.get('/overseer/api/unlock?command=' + task.command).then(function (response) {
            })
        }
    },
    data: function () {
        return {
            tasks: []
        };
    },
    template: '#tasks-nav-list'
});

