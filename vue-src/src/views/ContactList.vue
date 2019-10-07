<template>
    <div>
        <ul>
            <li v-for="contact in contacts" :key="contact.id">
                {{contact.first_name}}
                {{contact.last_name}}
            </li>
        </ul>
    </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      contacts: [],
    };
  },
  created() {
    axios.get('/api/contacts').then((response) => {
      this.contacts = response.data;
    });
  },
};
</script>
