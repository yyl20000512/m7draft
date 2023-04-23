// resources/js/router.js
import Vue from 'vue';
import VueRouter from 'vue-router';
import JobSeekersList from './components/JobSeekersList.vue';
import JobSeekerCreate from './components/JobSeekerCreate.vue';

Vue.use(VueRouter);

const routes = [
  { path: '/job_seekers', component: JobSeekersList },
  { path: '/job_seekers/create', component: JobSeekerCreate },
];

const router = new VueRouter({
  mode: 'history',
  routes,
});

export default router;
