import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './views/Home';
import Details from "./views/Details";

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
            component: Details,
            props: true,
        },
    ],
});
