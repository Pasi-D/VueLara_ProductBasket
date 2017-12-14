import Vue from 'vue'
import App from './App.vue'
import router from './routes.js'
import VeeValidate from 'vee-validate';
import vueResource from 'vue-resource';

Vue.use(VeeValidate);
Vue.use(vueResource);


new Vue({
  el: '#app',
  render: h => h(App),
  	router:router
})
