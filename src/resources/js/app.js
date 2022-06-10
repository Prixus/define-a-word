import Vue from 'vue';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import router from './router/routes';
import Fragment from 'vue-fragment';
import Vuelidate from 'vuelidate';

Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(Vuelidate);
window.Vue = require('vue').default;
Vue.component('app', require('./components/App.vue').default);

Vue.use(Fragment.Plugin);

/**
 * For application's main vue
 */
new Vue({
    el: '#app',
    router
});
