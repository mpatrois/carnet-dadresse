<template>
    <div v-if="contact !== null">
        <header>
            <div>
                <img :src="contact.avatar_path">
            </div>
            {{contact.first_name}}
            {{contact.last_name}}
        </header>
        <div>
            <h2>Communication</h2>
            <div>
                email : {{contact.email}}
            </div>
            <div>
                Mobile Phone : {{contact.mobile_phone}}
            </div>
            <div>
                Work Phone : {{contact.work_phone}}
            </div>
        </div>
         <div>
            <h2>Adresse</h2>
            <div>
                Street : {{contact.street}}
            </div>
            <div>
                Postal Code : {{contact.postal_code}}
            </div>
            <div>
               City : {{contact.city}}
            </div>
        </div>
        <div>
            <ul>
                <li v-for="source in contact.sources" :key="source.id">
                    {{source.name}}
                </li>
            </ul>
        </div>
        <div>
            <h2>Notes</h2>
             {{contact.notes}}
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      contact: null,
      allSources: [],
    };
  },
  created() {
    this.getContact(this.$route.params.contactId);
    axios.get('/api/sources').then((response) => {
      this.allSources = response.data;
    });
  },
  watch: {
    '$route.params.contactId': function contactIdChange(id) {
      this.getContact(id);
    },
  },
  methods: {
    getContact(id) {
      axios.get(`/api/contacts/${id}`).then((response) => {
        this.contact = response.data;
      });
    },
  },
};
</script>
