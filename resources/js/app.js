import VueRouter from 'vue-router';
import HeaderComponent from "./components/HeaderComponent";
import FooterComponent from "./components/FooterComponent";
import TaskListComponent from "./components/TaskListComponent";
import TaskShowComponent from "./components/TaskShowComponent";
import TaskCreateComponent from "./components/TaskCreateComponent";
import TaskEditComponent from "./components/TaskEditComponent";
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';

require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('header-component', HeaderComponent);
Vue.component('footer-component', FooterComponent);

Vue.use(VueRouter);
Vue.use(Vuetify);

const router = new VueRouter({
    mode: 'history',
    routes: [{
            path: '/',
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
    router,
    vuetify: new Vuetify()
});
