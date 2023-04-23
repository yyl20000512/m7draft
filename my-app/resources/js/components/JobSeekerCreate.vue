<template>
  <div>
    <h1>Create Job Seeker</h1>
    <form @submit.prevent="createJobSeeker">
      <div>
        <label for="name">Name:</label>
        <input type="text" id="name" v-model="jobSeeker.name" required>
      </div>
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="jobSeeker.email" required>
      </div>
      <div>
        <label for="password">Password:</label>
        <input type="password" id="password" v-model="jobSeeker.password" required>
      </div>
      <div>
        <label for="profile">Profile:</label>
        <input type="text" id="profile" v-model="jobSeeker.profile" required>
      </div>
      <div>
        <label for="job_search_status">Job Search Status:</label>
        <select id="job_search_status" v-model="jobSeeker.job_search_status" required>
          <option :value="true">Active</option>
          <option :value="false">Inactive</option>
        </select>
      </div>
      <button type="submit">Create Job Seeker</button>
    </form>
  </div>
</template>

<script>
import axios from '../axios';

export default {
  name: "job-seeker-create",
  // Update jobSeeker data property
  data() {
    return {
      jobSeeker: {
        name: '',
        email: '',
        password: '',
        profile: '',
        job_search_status: true,
      },
    };
  },
  methods: {
    async createJobSeeker() {
      try {
        const response = await axios.post('/job_seekers', this.jobSeeker);
        alert('Job seeker created successfully!');
      } catch (error) {
        console.error('Error creating job seeker:', error);
        alert('Failed to create job seeker. Please try again.');
      }
    },
  },
};
</script>
