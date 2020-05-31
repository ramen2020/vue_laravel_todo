import VueRouter from 'vue-router';
import HeaderComponent from "./components/HeaderComponent";
import TaskListComponent from "./components/TaskListComponent";
import TaskShowComponent from "./components/TaskShowComponent";
import TaskCreateComponent from "./components/TaskCreateComponent";
import TaskEditComponent from "./components/TaskEditComponent";



require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('header-component', HeaderComponent);

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [{
            path: '/tasks',
            name: 'task.list',
            component: TaskListComponent
        },
        {
            path: '/tasks/:taskId',
            name: 'task.show',
            component: TaskShowComponent,
            props: true
        },
        {
            path: '/tasks/create',
            name: 'task.create',
            component: TaskCreateComponent,
        },
        {
            path: '/tasks/:taskId/edit',
            name: 'task.edit',
            component: TaskEditComponent,
            props: true
        },
    ]
});

const app = new Vue({
    el: '#app',
    router
});
