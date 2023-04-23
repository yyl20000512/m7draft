require('./bootstrap');
import router from './router';

window.Vue = require('vue').default;

Vue.component('hello-world', require('./components/HelloWorld.vue').default);
Vue.component('another-vue', require('./components/AnotherVue.vue').default);
Vue.component('text-entry', require('./components/TextEntry.vue').default);

Vue.component('job-seekers-list', require('./components/JobSeekersList.vue').default);
Vue.component('job-seeker-create', require('./components/JobSeekerCreate.vue').default);
Vue.component('job-seeker-edit', require('./components/JobSeekerEdit.vue').default);
Vue.component('job-seeker-show', require('./components/JobSeekerShow.vue').default);

Vue.component('employers-list', require('./components/EmployersList.vue').default);
Vue.component('employer-create', require('./components/EmployerCreate.vue').default);
Vue.component('employer-edit', require('./components/EmployerEdit.vue').default);
Vue.component('employer-show', require('./components/EmployerShow.vue').default);

Vue.component('jobs-list', require('./components/JobsList.vue').default);
Vue.component('job-create', require('./components/JobCreate.vue').default);
Vue.component('job-edit', require('./components/JobEdit.vue').default);
Vue.component('job-show', require('./components/JobShow.vue').default);

Vue.component('dashboard',require('./components/Dashboard.vue').default);
Vue.component('job-seeker-profile-form',require('./components/JobSeekerProfileForm.vue').default);

const app = new Vue({
    el: '#app',
    router,
});
