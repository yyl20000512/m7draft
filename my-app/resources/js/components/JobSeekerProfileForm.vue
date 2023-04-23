<template>
  <div>
    <p><strong>UserId:</strong> {{ userId }}</p>
    <form @submit.prevent="submitForm">
      <div>
        <label for="personal_details">Personal Details:</label>
        <textarea id="personal_details" v-model="profile.personal_details"></textarea>
      </div>
      <div>
        <label for="job_search_status">Job Search Status:</label>
        <select id="job_search_status" v-model="profile.job_search_status">
          <option value="actively_looking">Actively Looking</option>
          <option value="passively_looking">Passively Looking</option>
          <option value="not_looking">Not Looking</option>
        </select>
      </div>
      <button type="submit">Save</button>
    </form>
  </div>
</template>

<script>
import axios from '../axios';

export default {
  name: "job_seeker_profiles",
  props: {
    userId: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      profile: {
        id: '',
        personal_details: '',
        job_search_status: 'actively_looking',
      },
    };
  },
  created() {
    this.fetchUserProfile();
  },
  methods: {
    async fetchUserProfile() {
      try {
        const response = await axios.get(`/job_seeker_profiles/${this.userId}`);
        console.log('Response data:', response.data);

        if (response.data) {
          this.profile = response.data;
        }
      } catch (error) {
        console.error('Error fetching user profile:', error);
      }
    },
    async submitForm() {
      try {
        if (this.profile.id) {
          // Update existing profile
          console.log('update');
          const response = await axios.put(`/job_seeker_profiles/${this.profile.id}`);
        } else {
          // Create new profile
          console.log('create');
          const response = await axios.post('/job_seeker_profiles', { ...this.profile, user_id: this.userId });
        }
        alert('Profile saved successfully!');
      } catch (error) {
        console.error('Error saving profile:', error);
        alert('Error saving profile');
      }
    },
  },
};
</script>
