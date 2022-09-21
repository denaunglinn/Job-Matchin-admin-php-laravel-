import './bootstrap';
import Vue from 'vue'
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import ExampleComponent from './components/ExampleComponent.vue';
import HomeComponent from './components/HomeComponent.vue';
import HomePage from './components/HomePage.vue';
import App from './components/App.vue';

window.Vue = require('vue');
Vue.use(VueRouter);
Vue.use(VueAxios, axios);

Vue.component('example-component', ExampleComponent);


const routes = [
    {
        name:'welcome',
        path:'/example',
        component:ExampleComponent
    },
    {
        name: 'home',
        path: '/',
        component: HomePage
    },

    {
        name: 'testing',
        path: '/testing',
        component: HomeComponent
    },
    
  ];

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
