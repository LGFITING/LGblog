<template>
  <div id="app">
    <img src="./assets/logo.png">
    <div class="header">
  <router-link to="/home">Home</router-link>
  <router-link to="/aboutus">Abouts</router-link>
  <router-link to="/product">Product</router-link>
  <router-link to="/news">News</router-link>
  <router-link to="/service">Service</router-link>
  <router-link to="/foo">Go to Foo</router-link>
  <router-link to="/bar">Go to Bar</router-link>
  <router-view></router-view>
</div>
  </div>
</template>

<script>
export default {
  name: 'app',
  data () {
    return {

    }
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

h1, h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}
</style>
