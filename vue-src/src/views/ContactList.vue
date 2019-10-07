<template>
    <div>
        <input v-model="searchQuery" />
        <ul>
            <li v-for="source in sources" :key="source.id">

                <label :for="'source-'+source.id">{{source.name}}
                     <input
                        type="checkbox"
                        :id="'source-'+source.id"
                        :value="source.id" v-model="activedSources">
                </label>
            </li>
        </ul>
        <ul>
            <li v-for="contact in filteredContacts" :key="contact.id">
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
      activedSources: [],
      searchQuery: '',
    };
  },
  created() {
    axios.get('/api/contacts').then((response) => {
      this.contacts = response.data;
    });
  },
  computed: {
    filteredContacts() {
      return this.contacts.filter((contact) => {
        const allFields = `${contact.first_name} ${contact.first_name} ${contact.email}`;
        return allFields.toLowerCase().includes(this.searchQuery.toLowerCase());
      }).filter((contact) => {
        if (this.activedSources.length === 0) {
          return true;
        }
        for (let i = 0; i < this.activedSources.length; i += 1) {
          const sourceActiveId = this.activedSources[i];
          if (contact.sources.map(s => s.id).includes(sourceActiveId)) {
            return true;
          }
        }
        return false;
      });
    },
    sources() {
      const sourcesFinal = [];
      const sourcesArrays = this.contacts.map(contact => contact.sources);
      sourcesArrays.forEach((sourcesArray) => {
        sourcesArray.forEach((source) => {
          if (sourcesFinal.filter(s => s.id === source.id).length === 0) {
            sourcesFinal.push(source);
          }
        });
      });
      return sourcesFinal;
    },
  },
};
</script>
