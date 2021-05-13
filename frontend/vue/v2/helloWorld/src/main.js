import Vue from 'vue'
import App from './App.vue'

import router from './router';
import store from './store'

import 'normalize.min.css';
import './styles/style.css';

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
