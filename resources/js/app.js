/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('app-menu', require('./components/menu/Menu.vue').default);

// https://www.npmjs.com/package/datatables
//https://www.npmjs.com/package/js-datepicker
// https://www.npmjs.com/package/vuejs-datepicker

import Vue from 'vue'
import datables from 'datatables'
import Swal from 'sweetalert2'
import waitingDialog from 'bootstrap-waitingfor'
import datepicker from 'js-datepicker'
import vDatepicker from 'vuejs-datepicker';
import vSelect from "vue-select";
import language from "../../node_modules/vuejs-datepicker/dist/locale/translations/es";

Vue.component('datepicker', vDatepicker ) ;
Vue.component('v-select', vSelect ) ;


window.Swal = Swal
window.waitingDialog = waitingDialog
window.datepicker = datepicker
window.language = language


/*
    start
*/
import requestDebitCard from './components/RequestDebitCard.vue'
import requestDebitCardShow from './components/RequestDebitCardShow.vue'
import requestCreditCard from './components/RequestCreditCard.vue'
import requestCreditCardShow from './components/RequestCreditCardShow.vue'
import requestLoan from './components/RequestLoan.vue'
import evalutionCreditCard from './components/EvalutionCreditCard.vue'
import evalutionRequestLoan from './components/EvalutionRequestLoan.vue'

/*
end 
*/

import registerPerson from './components/RegisterPerson.vue'
import VueRouter from 'vue-router'
import showUsers from './components/Users/Users.vue'
import registerUsers from './components/Users/Register.vue'
import registerWeb from './components/RegisterWeb.vue'
import registerBorrow from './components/RegisterBorrow.vue'
import registerDataBorrow from './components/RegisterDataBorrow.vue'

Vue.use(VueRouter)

const router = new VueRouter({
    routes: [
        {
            path: '/request-debit-card',
            component: requestDebitCard
        },
        {
            path: '/request-debit-card-show',
            component: requestDebitCardShow
        },
        {
            path: '/request-credit-card',
            component: requestCreditCard
        },
        {
            path: '/request-credit-card-show',
            component: requestCreditCardShow
        },
        {
            path: '/request-loan',
            component: requestLoan
        },
        {
            path:'/evalution-credit-card',
            component: evalutionCreditCard
        },
        {
            path:'/evalution-request-loan',
            component: evalutionRequestLoan
        },
        {
            path: '/registerPerson',
            component: registerPerson
        },
        {
            path: '/showUsers',
            component: showUsers
        },
        {
            path: '/registerUsers',
            component: registerUsers
        },
        {
            path: '/registerWeb',
            component: registerWeb
        },
        {
            path: '/registerBorrow',
            component: registerBorrow
        }
        ,
        {
            path: '/registerDataBorrow',
            component: registerDataBorrow
        }
    ]
})


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
