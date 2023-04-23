<template>
  <div>
    <h1>Job Seeker Details</h1>
    <div v-if="jobSeeker">
      <p><strong>Name:</strong> {{ jobSeeker.name }}</p>
      <p><strong>Email:</strong> {{ jobSeeker.email }}</p>
      <p><strong>Job Search Status:</strong> {{ jobSeeker.job_search_status }}</p>
    </div>
  </div>
</template>

<script>
import axios from '../axios';

export default {
  props: ['id'],
  data() {
    return {
      jobSeeker: null,
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
  },
};
</script>
