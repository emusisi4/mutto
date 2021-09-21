
require('./bootstrap');

window.Vue = require('vue');
import { values } from 'lodash';
import VueProgressBar from 'vue-progressbar'

import Select2 from 'v-select2-component';
Vue.component ('Select2', Select2);

import VueHtmlToPaper from "vue-html-to-paper";

// ...
const options = {
  name: "_blank",
  specs: ["fullscreen=yes", "titlebar=yes", "scrollbars=yes"],
  styles: [
    "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css",
    "https://unpkg.com/kidlat-css/css/kidlat.css"
  ]
};

Vue.use(VueHtmlToPaper, options);


Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '10px',
  thickness: '10px',
  transition: {
    speed: '0.10s',
   
    termination: 300
  },
  autoRevert: true,
  location: 'top',
  inverse: false


})
// Working on the Form Start
/// for installtion - run npm i axios vform
// importing the form 
import { Form, HasError, AlertError } from 'vform';
import Vue from 'vue';
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;

// End of form Use

//// Sweet alert
import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});
window.Toast = Toast;

window.Fire = new Vue();



import VueRouter from 'vue-router'
Vue.use(VueRouter)

/// importing Moment after npm install moment --save
import moment from 'moment';

Vue.component('passport-clients', require('./components/passport/Clients.vue'));

Vue.component('passport-authorized-clients',require('./components/passport/AuthorizedClients.vue'));

Vue.component('passport-personal-access-tokens',require('./components/passport/PersonalAccessTokens.vue'));
Vue.component('pagination', require('laravel-vue-pagination'));
let routes = [
  
  { path: '/dashboard', component: require('./components/Dashboard.vue') },
  //{ path: '/print', component: require('./components/Print.vue') },



//SENA HARDWARE

{ path: '/products', component: require('./components/Products.vue')},
{ path: '/pos', component: require('./components/Pos.vue')},
	

/// SENA HARD WARE END












{ path: '/hrmsettintings', component: require('./components/Hrsettings.vue') },
{ path: '/settings', component: require('./components/Settings.vue') },
{ path: '/example', component: require('./components/ExampleComponent.vue') },
{ path: '/hrms', component: require('./components/HumanresourcemainComponent.vue') },
{ path: '/expenses', component: require('./components/Expensescomponent.vue') },
{ path: '/fishmanagement', component: require('./components/Fishcodessetting.vue') },
{ path: '/fishsalesreport', component: require('./components/Dailyfishsalesreport.vue') },
{ path: '/financereports', component: require('./components/Financereports.vue') },
{ path: '/companydetails', component: require('./components/Companydetails.vue') },
{ path: '/expensesreports', component: require('./components/Expensesreports.vue') },
////////
{ path: '/componentsandfeatures', component: require('./components/Componentandformfeatures.vue')},
{ path: '/cashtransactions', component: require('./components/Cashtransactions.vue')},
{ path: '/incomes', component: require('./components/Companyincomes.vue')},
{ path: '/creditanddebotreports', component: require('./components/Debitandcredirreports.vue')},
{ path: '/fishcodeperformance', component: require('./components/Fishcodeperformance.vue')},
 { path: '/companypayments', component: require('./components/Companypayments.vue')},
  ]
  const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
  })
 
Vue.filter('upText', function(text){
return text.toUpperCase();
});


Vue.filter('firstletterCapital', function(text){
  return text.charAt(0).toUpperCase() + text.slice(1);
  });

  Vue.filter('myDate', function(created){
    return moment(created).format("MMM Do YY");
  });
  Vue.filter('myDate2', function(created){
    return moment(created).format("dddd Do MMMM YYYY  ");
  });
  Vue.filter('round', function(value, decimals) {
    if(!value) {
      value = 0;
    }
  
    if(!decimals) {
      decimals = 3;
    }
  
    value = Math.round(value * Math.pow(10, decimals)) / Math.pow(10, decimals);
    return value;
  });

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    router,
    data:{
      search: ''
    },
});
