<template>
  <div v-if="job">
    <h1>Edit Job</h1>
    <form @submit.prevent="updateJob">
      <div>
        <label for="title">Title:</label>
        <input type="text" id="title" v-model="job.title" />
      </div>
      <div>
        <label for="description">Description:</label>
        <textarea id="description" v-model="job.description"></textarea>
      </div>
      <div>
        <label for="type">Type:</label>
        <input type="text" id="type" v-model="job.type" />
      </div>
      <div>
        <label for="requirements">Requirements:</label>
        <textarea id="requirements" v-model="job.requirements"></textarea>
      </div>
      <div>
        <label for="employer_id">Employer ID:</label>
        <input type="text" id="employer_id" v-model="job.employer_id" />
      </div>
      <button type="submit">Update Job</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

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
    async updateJob() {
      try {
        await axios.put(`/api/jobs/${this.id}`, this.job);
        alert('Job updated successfully!');
        this.$router.push(`/jobs/${this.id}`);
      } catch (error) {
        console.error('Error updating job:', error);
        alert('Failed to update job. Please try again.');
      }
    },
  },
};
</script>
