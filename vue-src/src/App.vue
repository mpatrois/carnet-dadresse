<template>
  <div id="app">
    <div id="contact-nav">
      <ContactList/>
    </div>
    <div id="main-view">
      <router-view/>
    </div>
  </div>
</template>

<script>
import ContactList from './components/ContactList.vue';

export default {
  components: { ContactList },
};
</script>

<style lang="scss">
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

html, body{
  height: 100%;
  width: 100%;
  padding: 0px;
  margin: 0px;
}

$size-contact-bar: 300px;

#contact-nav{
  width: $size-contact-bar;
  height: 100%;
  position: fixed;
  top:0px;
  left: 0px;
  overflow-y: auto;
  z-index: 10;
}

#main-view{
  height: 100%;
  width: 100%;
  position: fixed;
  padding-left: 200px;
  box-sizing: border-box;
  overflow-y: auto;
}

ul{
  padding: 0px;
  li{
    list-style-type: none;
  }
}

</style>
