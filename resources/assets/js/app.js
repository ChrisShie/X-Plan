require('bootstrap');
import $ from 'jquery';
import Vue from 'vue'
import VueRouter from 'vue-router'
import router from './router/index'
import * as uiv from 'uiv'
import VueMoment from 'vue-moment'
import moment from 'moment-timezone'

window.Vue = require('vue');
Vue.use(VueRouter);
Vue.use(uiv, {prefix: 'uiv'});
Vue.use(VueMoment, {
    moment,
})

const app = new Vue({
    el: '#app',
    router
});