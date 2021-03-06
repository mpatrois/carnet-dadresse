import Vue from 'vue';
import axios from 'axios';
import App from './App.vue';
import router from './router';

Vue.config.productionTip = false;


axios.get('/api/xsrf-cookie-token').then(() => {
  new Vue({
    router,
    render: h => h(App),
  }).$mount('#app');
});
