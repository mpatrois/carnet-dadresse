import Vue from 'vue';
import Router from 'vue-router';
import Home from './views/Home.vue';
import ContactDetail from './views/ContactDetail.vue';

Vue.use(Router);

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home,
    },
    {
      path: '/contact/:contactId',
      name: 'ContactDetail',
      component: ContactDetail,
    },
  ],
});
