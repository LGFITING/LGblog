<template class="Home">
<transition name="fade">
  <div class="wrapper">
  <div class="content-title">
    {{msg}}
  </div>
<p>原生的上拉加载</p>
<p v-bind:title="message">鼠标悬停显示提示信息</p>
<p>Computed（计算属性依赖缓存，只要值没有变化，那么方法就不会执行也得到同样的结果）:{{testFunction}}</p>
<p>{{fullName}}</p>
<p>{{thefullName}}</p>
<p>{{thefullName2}}</p>
<button v-on:click="add">点击次数:{{counter}}</button>
<br>
<!-- <input v-bind:value="something" v-on:input="something = $event.target.value"> -->
<pre>
&lt;script&gt;
 //获取滚动条当前的位置
    function getScrollTop() {
    var scrollTop = 0;
    if (document.documentElement && document.documentElement.scrollTop) {
    scrollTop = document.documentElement.scrollTop;
    }
    else if (document.body) {
    scrollTop = document.body.scrollTop;
    }
    return scrollTop;
    }

    //获取当前可视范围的高度
    function getClientHeight() {
    var clientHeight = 0;
    if (document.body.clientHeight && document.documentElement.clientHeight) {
    clientHeight = Math.min(document.body.clientHeight, document.documentElement.clientHeight);
    }
    else {
    clientHeight = Math.max(document.body.clientHeight, document.documentElement.clientHeight);
    }
    return clientHeight;
    }

    //获取文档完整的高度
    function getScrollHeight() {
    return Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
    }
        window.onscroll = function () {
        if (getScrollTop() + getClientHeight() == getScrollHeight()) {
        	str = '&lt;ul style="width:100px;height:200px;border:1px solid red;"&gt;&lt;li&gt;11111111&lt;/li&gt;&lt;/ul&gt;';
        	document.getElementById('main').innerHTML += str;
        }
    }
        //ajax从这里开始
&lt;/script&gt;
</pre>
</div>
</transition>
</template>
<script type="text/javascript">
  export default{
    data(){
      return{
        msg:'博文',
        message:"悬停时间为"+new Date(),
        firstName:'刘',
        lastName:'贯',
        fullName:'刘贯',
        counter:0
      }
  },
  computed:{
      testFunction:function () {
          return this.msg.split('').reverse().join('')
      },
      thefullName:function () {
          return this.firstName+''+this.lastName
      },
      thefullName2:{
          get:function(){
              return this.firstName+''+this.lastName
          },
          set:function (newValue){
              var names = newValue.split('')
              this.firstName = names[0]
              this.lastName = names[name.length-1]
          }
      }
  },
  watch:{
      firstName:function(val){
          this.fullName = val+''+this.lastName
      },
      lastName:function (val){
          this.fullName = this.firstName+ ''+val
      }
  },
  methods:{
      add:function(){
          this.counter++
      }
  }
  }
</script>
<style scoped>
 *{
     font-family: '微软雅黑';
 }

</style>
