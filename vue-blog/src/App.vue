<template>
  <div id="app">
<header>
   <div id="header">

   </div>
</header>
<content>
  <div id="content">
  <xivprofile></xivprofile>
  </div>
</content>
  <router-link to="/home">Home</router-link>
  <router-link to="/aboutus">Abouts</router-link>
  <router-link to="/product">Product</router-link>
  <router-link to="/news">News</router-link>
  <router-link to="/service">Service</router-link>
  <!-- <router-link to="/foo">Go to Foo</router-link>
  <router-link to="/bar">Go to Bar</router-link> -->
  <router-view keep-alive transition="fade" transition-mode='out-in'></router-view>
  </div>
</template>

<script>
import xivprofile from './components/Xivprofile.vue';
export default {
  name: 'app',
  data () {
    return {

    }
  },
    components:{
      xivprofile
    }
}
</script>

<style>
*{
  margin: 0;
  padding: 0;
}
body{
  background: #e7eef4;
}
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
  margin-top: 200px;
  box-sizing: border-box;
  padding: 0;
}
#header{
  width: 100%;
  height: 200px;
  position: absolute;
  top: 0px;
  background: url('../static/images/sinablogb.jpg') -100px 0px;
}
#content{
  border: 1px solid red;
  width: 1150px;
  margin: 240px 100px 0px 100px;
  height: 500px;
  padding: 10px;
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
