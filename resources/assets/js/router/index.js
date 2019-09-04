import Vue from 'vue';
import VueRouter from 'vue-router';
import Employe from '../components/EmployeComponent.vue';
import Societe from '../components/SocieteComponent.vue';

Vue.use(VueRouter);

const routes = [
    {path: '/employe', component: Employe, name: 'employe'},
    {path: '/societe', component: Societe, name: 'societe'},
];

export default new VueRouter({
    mode: 'hash',
    routes
});