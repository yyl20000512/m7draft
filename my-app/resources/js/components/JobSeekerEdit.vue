<template>
  <div>
    <h1>Edit Job Seeker</h1>
    <form v-if="jobSeeker" @submit.prevent="updateJobSeeker">
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
      <button type="submit">Update Job Seeker</button>
    </form>
    <div v-else>Loading...</div>
  </div>
</template>

<script>
import axios from '../axios';

export default {
  name: "job-seeker-edit",
  props: ['id'],
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
  created() {
    console.log('Job Seeker ID:', this.id);
    this.fetchJobSeeker();
  },
  methods: {
    async fetchJobSeeker() {
      try {
        const response = await axios.get(`/job_seekers/${this.id}`);
        console.log('Response data:', response.data); // Add this line to check the response data
        this.jobSeeker = response.data;
      } catch (error) {
        console.error('Error fetching job seeker:', error);
      }
    },
    async updateJobSeeker() {
      try {
        const response = await axios.put(`/job_seekers/${this.id}`, this.jobSeeker);
        console.log('Response data:', response.data);
        alert('Job seeker updated successfully!');
      } catch (error) {
        console.error('Error updating job seeker:', error);
        alert('Failed to update job seeker. Please try again.');
      }
    },
  },
};
</script>
