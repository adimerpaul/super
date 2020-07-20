

require('./bootstrap');

window.Vue = require('vue');
import VueToastr from "vue-toastr";
Vue.use(VueToastr);
import VueSimpleAlert from "vue-simple-alert";
Vue.use(VueSimpleAlert);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
});
