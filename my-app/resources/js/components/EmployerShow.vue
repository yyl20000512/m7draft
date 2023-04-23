<template>
  <div v-if="employer">
    <h1>{{ employer.name }}</h1>
    <p>Email: {{ employer.email }}</p>
    <p>Company: {{ employer.company }}</p>
    <router-link :to="`/employers/${employer._id}/edit`">Edit Employer</router-link>
  </div>
</template>

<script>
export default {
  props: ['id'],
  data() {
    return {
      employer: null,
    };
  },
  created() {
    this.fetchEmployer();
  },
  methods: {
    async fetchEmployer() {
      try {
        const response = await axios.get(`/api/employers/${this.id}`);
        this.employer = response.data;
      } catch (error) {
        console.error('Error fetching employer:', error);
      }
    },
  },
};
</script>