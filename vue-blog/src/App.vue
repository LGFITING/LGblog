<template>
  <div id="app">
<header>
   <div id="header">
         <!-- <img src="../static/images/lg.jpg" alt="ME" width="100" id="ME"> -->
<audio loop="loop" autoplay="autoplay">
  <source src="../static/music/dreamofKing.mp3" type="audio/mp3" />
</audio>
  <div class="defind">
    <h3>肆的博客</h3>
    <p>github地址：
      <a href="https://github.com/LGFITING/">https://github.com/LGFITING</a>
    </p>
    <ul>
      <li><router-link to="/home">首页</router-link></li>
      <li><span>|</span></li>
      <li>  <router-link to="/catalog">博文目录</router-link></li>
      <li><span>|</span></li>
      <li>  <router-link to="/news">图文心情</router-link></li>
      <li><span>|</span></li>
      <li><router-link to="/aboutme">关于我</router-link></li>
    </ul>
  </div>
   </div>
</header>
     <div id="logout" @click='logOut'>退出登录</div>
<content>
  <div id="content">
  <xivprofile name="刘贯"></xivprofile>
  <!-- <test v-model="price"></test> -->
    <router-view keep-alive transition="fade" transition-mode='out-in'></router-view>
  </div>
   <classify></classify>
</content>
  </div>
</template>

<script>
import xivprofile from './components/Xivprofile.vue';
import test from './components/Test.vue';
import classify from './components/Classify.vue';
export default {
  name: 'app',
  data () {
    return {

    }
  },
    components:{
      xivprofile,
      test,
      classify
    },
    methods:{
        logOut:function(){
          let vm = this;
          vm.$http.post('http://lg.blog.com/Index/logOut').then(function(response){
            console.log(response);
            window.location.href = 'http://lg.blog.com';
          });
        }
    }
}
</script>

<style>
*{
  margin: 0;
  padding: 0;
}
body{
  background: #E7EEF4;
  font-size: "微软雅黑","黑体";
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
a{
  text-decoration: none;
  color: #42b983;
}
p{
    margin: 4px;
    font-size: 14px;
}
audio{

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
  height: 40%;
  position: absolute;
  top: 0px;
  background: url('../static/images/sinablogb.jpg') -100px 0px no-repeat;
  /*background-position: center top;*/
}
#logout{
  position: absolute;
  width: 200px;
  height: 30px;
  top: 100px;
  left: 1500px;
  cursor: pointer;
}
#logout:hover{
  color: #56BB89;
}
.defind{
  position: relative;
  left: 300px;
  top: 130px;
  width: 500px;
}
.defind p{
  font-size: 12px;
  font-weight: bold;
  padding: 6px 0;
}
.defind ul li{
  color: #42b983;
  margin-left: 0px;
}
.defind ul li a{
    font-size: 14px;
  transition:opacity .5s,font-size .5s;
}
.defind ul li a:hover{
  opacity: .5;
  font-size: 18px;

}
#content{
  /*border: 1px solid red;*/
  background: #fff;
  width:960px;
  height: 600px;
 position: absolute;
  padding: 10px;
  margin: 50px auto;
  margin-bottom:0px;
  margin-left: 290px;
    /*border: 1px solid red;*/
}
.wrapper{
  width: 726px;
  height: 600px;
  margin-left: 232px;
  margin-top: -501px;
  /*border: 1px solid red;*/
  overflow: auto;
}
.content-title{
  background: #ECECEC;
  height: 20px;
  vertical-align: middle;
  color: #66666a;
  font-size: 12px;
  font-weight: bold;
  margin: 3px;
  line-height: 22px;
}

.fade-enter-active {
 transition: opacity .5s ease;
}
.fade-enter, .fade-leave-active {
 opacity: 0;
}
</style>
