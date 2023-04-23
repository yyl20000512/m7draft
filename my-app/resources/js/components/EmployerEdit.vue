<template>
  <div>
    <h1>Edit Employer</h1>
    <form v-if="employer" @submit.prevent="updateEmployer">
      <div>
        <label for="name">Name:</label>
        <input type="text" id="name" v-model="employer.name" />
      </div>
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="employer.email" />
      </div>
      <div>
        <label for="company">Company:</label>
        <input type="text" id="company" v-model="employer.company" />
      </div>
      <button type="submit">Update</button>
    </form>
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
    async updateEmployer() {
      try {
        await axios.put(`/api/employers/${this.id}`, this.employer);
        alert('Employer updated successfully!');
        this.$router.push('/employers');
      } catch (error) {
        console.error('Error updating employer:', error);
        alert('Failed to update employer. Please try again.');
      }
    },
  },
};
</script>
