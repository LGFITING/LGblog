<template>
  <div id="app">
    <img src="../static/images/lg.jpg" alt="ME" width="100" id="ME">
    <div class="header">
  <router-link to="/home">Home</router-link>
  <router-link to="/aboutus">Abouts</router-link>
  <router-link to="/product">Product</router-link>
  <router-link to="/news">News</router-link>
  <router-link to="/service">Service</router-link>
  <!-- <router-link to="/foo">Go to Foo</router-link>
  <router-link to="/bar">Go to Bar</router-link> -->
  <router-view keep-alive transition="fade" transition-mode='out-in'></router-view>
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
#ME{
    border-radius: 50%;
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
.fade-transition {
 transition: opacity .3s ease;
}
.fade-enter, .fade-leave {
 opacity: 0;
}
</style>
