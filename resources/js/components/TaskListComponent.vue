<template>
    <div class="container">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col" @click="sortTasksById(id_flg)">
                        <v-btn class="ma-2" small outlined color="success">
                            ID
                        </v-btn>
                    </th>
                    <th scope="col" @click="getTasksByCategoryId(category_id)">
                        <v-btn class="ma-2" small outlined color="success">
                            Category
                        </v-btn>
                    </th>
                    <th scope="col">
                        <v-btn class="ma-2" small outlined color="success">
                            Title
                        </v-btn>
                    </th>
                    <th scope="col">
                        <v-btn class="ma-2" small outlined color="success">
                            Edit
                        </v-btn>
                    </th>
                    <th scope="col">
                        <v-btn class="ma-2" small outlined color="success">
                            Category
                        </v-btn>
                    </th>
                    <th scope="col">
                        <v-btn class="ma-2" small outlined color="success">
                            Person In Charge
                        </v-btn>
                    </th>
                    <th scope="col">
                        <v-btn class="ma-2" small outlined color="success">
                            Edit
                        </v-btn>
                    </th>
                    <th scope="col">
                        <v-btn class="ma-2" small outlined color="success">
                            Delete
                        </v-btn>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="task in tasks">
                    <th scope="row">{{ task.id }}</th>
                    <td>{{ category_label[task.category_id] }}</td>
                    <td>{{ task.title }}</td>
                    <td>{{ task.content }}</td>
                    <td>{{ task.person_in_charge }}</td>
                    <td>
                        <router-link v-bind:to="{name: 'task.show', params: {taskId: task.id }}">
                            <button class="btn btn-primary">Show</button>
                        </router-link>
                    </td>
                    <td>
                        <router-link v-bind:to="{name: 'task.edit', params: {taskId: task.id }}">
                            <button class="btn btn-success">Edit</button>
                        </router-link>
                    </td>
                    <td>
                        <button class="btn btn-danger" v-on:click="deleteTask(task.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                tasks: [],
                category_label: [], //category_id　変換用
                id_flg: 1,
                category_id: 1,
            }
        },
        methods: {
            getAllTasks() {
                axios.get('/api/tasks')
                    .then((res) => {
                        this.tasks = res.data[0];
                        this.category_label = res.data[1];
                    });
            },
            deleteTask(id) {
                axios.delete('/api/tasks/' + id)
                    .then((res) => {
                        this.getAllTasks();
                    });
            },
            // id_flgが１：降順、２：昇順　で並び替え
            sortTasksById(id_flg) {
                if (id_flg === 1) {
                    this.id_flg = 2;
                } else {
                    this.id_flg = 1;
                }
                axios.get('/api/tasks/id/' + this.id_flg)
                    .then((res) => {
                        this.tasks = res.data;
                    });
            },
            // category_idで検索
            getTasksByCategoryId(category_id) {
                if (category_id === 5) {
                    this.category_id = 1;
                }
                axios.get('/api/tasks/category/' + this.category_id)
                    .then((res) => {
                        this.tasks = res.data;
                        this.category_id += 1;
                    });
            }
        },
        mounted() {
            this.getAllTasks();
        }
    }

</script>
