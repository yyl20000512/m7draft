<template>
  <div>
    <h1>Create Employer</h1>
    <form @submit.prevent="createEmployer">
      <div>
        <label for="name">Name:</label>
        <input type="text" id="name" v-model="employer.name" />
      </div>
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="employer.email" />
      </div>
      <div>
        <label for="password">Password:</label>
        <input type="password" id="password" v-model="employer.password" />
      </div>
      <div>
        <label for="company">Company:</label>
        <input type="text" id="company" v-model="employer.company" />
      </div>
      <button type="submit">Create</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      employer: {
        name: '',
        email: '',
        password: '',
        company: '',
      },
    };
  },
  methods: {
    async createEmployer() {
      try {
        await axios.post('/api/employers', this.employer);
        alert('Employer created successfully!');
        this.$router.push('/employers');
      } catch (error) {
        console.error('Error creating employer:', error);
        alert('Failed to create employer. Please try again.');
      }
    },
  },
};
</script>
