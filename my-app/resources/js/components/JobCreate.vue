<template>
  <div>
    <h1>Create Job</h1>
    <form @submit.prevent="createJob">
      <label>Title:
        <input type="text" v-model="job.title" required />
      </label>
      <label>Description:
        <textarea v-model="job.description" required></textarea>
      </label>
      <label>Type:
        <input type="text" v-model="job.type" required />
      </label>
      <label>Requirements:
        <textarea v-model="job.requirements" required></textarea>
      </label>
      <label>Employer ID:
        <input type="text" v-model="job.employer_id" required />
      </label>
      <button type="submit">Create Job</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      job: {
        title: '',
        description: '',
        type: '',
        requirements: '',
        employer_id: '',
      },
    };
  },
  methods: {
    async createJob() {
      try {
        await axios.post('/api/jobs', this.job);
        alert('Job created successfully!');
        this.$router.push('/jobs');
      } catch (error) {
        console.error('Error creating job:', error);
        alert('Failed to create job. Please try again.');
      }
    },
  },
};
</script>
