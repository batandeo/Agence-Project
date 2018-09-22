import Vue from 'vue';
import VueRouter from 'vue-router';
import Client from '../components/ClientComponent.vue';
import Rdv from '../components/RdvComponent.vue';
import Audiance from '../components/AudienceComponent.vue';
import Employe from '../components/EmployeComponent.vue';
import Imprimer from '../components/ImprimerComponent.vue';
import Administration from '../components/AdministrationComponent.vue';

Vue.use(VueRouter);

const routes = [
    {path: '/client', component: Client, name: 'client'},
    {path: '/rdv', component: Rdv, name: 'rdv'},
    {path: '/audiance', component: Audiance, name: 'audiances'},
    {path: '/employe', component: Employe, name: 'employe'},
    {path: '/imprimer', component: Imprimer, name: 'imprimer'},
    {path: '/administration', component: Administration, name: 'administration'}
];

export default new VueRouter({
    mode: 'hash',
    routes
});