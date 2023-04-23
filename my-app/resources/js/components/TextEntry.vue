<template>
  <div>
    <input type="text" v-model="text" />
    <button @click="submitText">Submit</button>
    <div>{{ message }}</div>
    <ul>
      <li v-for="entry in entries" :key="entry.id">{{ entry.text }}</li>
    </ul>
  </div>
</template>

<script>
import axios from '../axios';

export default {
  data() {
    return {
      text: "",
      message: "",
      entries: [],
    };
  },
  created() {
    this.fetchTextEntries();
  },
  methods: {
    async submitText() {
      if (this.text.trim() === "") {
        this.message = "Can not be empty.";
      } else {
        try {
          const response = await axios.post("/text-entry", { text: this.text });
          this.message = "Submitted text: " + response.data.text;
        } catch (error) {
          this.message = "Error submitting text.";
        }
      }
    },
    async fetchTextEntries() {
      try {
        const response = await axios.get('/text-entry');
        this.entries = response.data;
      } catch (error) {
        console.error('Error fetching text entries:', error);
      }
    },
  },
};
</script>