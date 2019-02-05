import Vue from 'vue';
import VueRouter from 'vue-router';
import Hello from './views/Hello';
import Home from './views/Home';

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/home',
            name: 'home',
            component: Home
        },
        {
            path: '/item/:id',
            name: 'list.item',
            component: Hello,
            props: true,
        },
    ],
});
