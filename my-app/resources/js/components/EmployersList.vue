<template>
  <div>
    <h1>Employers</h1>
    <ul>
      <li v-for="employer in employers" :key="employer.id">
        {{ employer.name }}
      </li>
    </ul>
  </div>
</template>

<script>
import axios from '../axios';

export default {
  name: "employers-list",
  data() {
    return {
      employers: [],
    };
  },
  created() {
    this.fetchEmployers();
  },
  methods: {
    async fetchEmployers() {
      try {
        const response = await axios.get('/employers');
        console.log('Fetched employers:', response.data);
        this.employers = response.data;
      } catch (error) {
        console.error('Error fetching employers:', error);
      }
    },
  },
};
</script>