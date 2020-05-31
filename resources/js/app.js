import VueRouter from 'vue-router';
import HeaderComponent from "./components/HeaderComponent";
import TaskListComponent from "./components/TaskListComponent";
import TaskShowComponent from "./components/TaskShowComponent";



require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('header-component', HeaderComponent);

Vue.use(VueRouter);

// 「/tasks」のURLでアクセスしたら「TaskListComponent」を表示する。このルーティングの名前は「task.list」である。
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
    ]
});

const app = new Vue({
    el: '#app',
    router
});
