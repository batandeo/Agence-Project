/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.$ = require('jquery');
window.JQuery = require('jquery');

import Vue from 'vue';
import Modal from './components/ModalComponent.vue';
import AppSidebar from './components/AppSidebarComponent.vue';
import AuthSwitch from './components/auth/AuthSwitch.vue';
import AuthNavbar from './components/auth/AuthNavbar.vue';
import router from "./router/index";
import Toast from 'vue-easy-toast';
import V2Table from 'v2-table';
import 'beautify-scrollbar/dist/index.css';
import 'v2-table/dist/index.css';

import vSuggest from 'v-suggest';



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(Toast);
Vue.component('app1', require('./components/app.vue'));
Vue.use(V2Table);
Vue.use(vSuggest);

const app = new Vue({
    el: '#app',
    components: {Modal, AppSidebar, AuthSwitch, AuthNavbar},
    router,
    mounted() {
    }
});
