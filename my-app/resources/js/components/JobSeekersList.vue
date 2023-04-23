<template>
  <div>
    <h1>Job Seekers</h1>
    <ul>
      <li v-for="jobSeeker in jobSeekers" :key="jobSeeker.id">
        {{ jobSeeker.name }}
      </li>
    </ul>
  </div>
</template>

<script>
import axios from '../axios';

export default {
  name: "job-seekers-list",
  data() {
    return {
      jobSeekers: [],
    };
  },
  created() {
    this.fetchJobSeekers();
  },
  methods: {
    async fetchJobSeekers() {
      try {
        const response = await axios.get('/job_seekers');
        console.log('Fetched job seekers:', response.data);
        this.jobSeekers = response.data;
      } catch (error) {
        console.error('Error fetching job seekers:', error);
      }
    },
  },
};
</script>
