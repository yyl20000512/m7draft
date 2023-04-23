<template>
  <div v-if="job">
    <h1>{{ job.title }}</h1>
    <p>Description: {{ job.description }}</p>
    <p>Type: {{ job.type }}</p>
    <p>Requirements: {{ job.requirements }}</p>
    <p>Employer ID: {{ job.employer_id }}</p>

    <router-link :to="`/jobs/${job._id}/edit`">Edit Job</router-link>
  </div>
</template>

<script>
export default {
  props: ['id'],
  data() {
    return {
      job: null,
    };
  },
  created() {
    this.fetchJob();
  },
  methods: {
    async fetchJob() {
      try {
        const response = await axios.get(`/api/jobs/${this.id}`);
        this.job = response.data;
      } catch (error) {
        console.error('Error fetching job:', error);
        alert('Failed to fetch job. Please try again.');
      }
    },
  },
};
</script>
