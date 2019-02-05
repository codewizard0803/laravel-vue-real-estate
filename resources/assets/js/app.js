
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';

import Vue from 'vue';
import axiosConfig from './axiosConfig';
import router from './router';
import App from './views/App';

const app = new Vue({
    el: '#vue-app',
    components: { App },
    router,
});