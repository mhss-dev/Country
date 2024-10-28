import { createWebHistory, createRouter } from 'vue-router'
import CountryDetails from '../views/Details.vue'; 
import Country from '@/components/Country.vue';

const routes = [
  {
    path: '/home',
    name: 'Home',
    component: Country,
  },
  {
    path: '/:pathMatch(.*)*',
    redirect: '/home',
  },
  {
    path: '/pays/:name', 
    name: 'CountryDetails',
    component: CountryDetails,

  },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
