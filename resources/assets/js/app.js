
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';

import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import App from './views/App';
import Hello from './views/Hello';
import Home from './views/Home';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/home',
            name: 'home',
            component: Home
        },
        {
            path: '/hello',
            name: 'hello',
            component: Hello,
        },
    ],
});
axios.defaults.baseURL = '/api';
axios.defaults.headers.common['Authorization'] = 'Bearer ' + USER_API_TOKEN;

const getCurrentUser = async () => {
    const response = await axios.get('/user');
    return response.data;
};

const displayUserData = async () => console.log(await getCurrentUser());

displayUserData();

const app = new Vue({
    el: '#vue-app',
    components: { App },
    router,
});