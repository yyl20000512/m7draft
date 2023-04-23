<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <p><strong>Name:</strong> {{ name }}</p>
          <p><strong>Email:</strong> {{ email }}</p>
          <p><strong>user_type:</strong> {{ user_type }}</p>
          <div class="card-header">{{ 'Dashboard01' }}</div>

          <div class="card-body">
            <job-seeker-profile-form v-if = "user_type === 'job_seeker'" :user-id="loggedInUserId" />
            <div v-else>
              {{ 'You are logged in!' }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from '../axios';
import JobSeekerProfileForm from './JobSeekerProfileForm.vue';

export default {
  name: "dashboard",
  components: {
    JobSeekerProfileForm,
  },
  data() {
    return {
      loggedInUserId: null,
      name: null,
      email: null,
      user_type: null, 
      existingProfile: null,
    };
  },
  created() {
    this.fetchUserData();
  },
  methods: {
    async fetchUserData() {
      try {

        const response = await axios.get('/user');
        console.log('Response data:', response.data);

        this.loggedInUserId = response.data.user_id;
        this.name = response.data.name;
        this.email = response.data.email;
        this.user_type = response.data.user_type;
        this.existingProfile = response.data.profile;
      } catch (error) {
        console.error('Error fetching user data:', error);
      }
    },
  },
};
</script>