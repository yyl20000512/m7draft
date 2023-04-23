<template>
  <div>
    <h1>Jobs</h1>
    <ul>
      <li v-for="job in jobs" :key="job.id">
        {{ job.title }}
      </li>
    </ul>
  </div>
</template>

<script>
import axios from '../axios';

export default {
  name: "jobs-list",
  data() {
    return {
      jobs: [],
    };
  },
  created() {
    this.fetchJobs();
  },
  methods: {
    async fetchJobs() {
      try {
        const response = await axios.get('/jobs');
        this.jobs = response.data;
      } catch (error) {
        console.error('Error fetching jobs:', error);
      }
    },
  },
};
</script>