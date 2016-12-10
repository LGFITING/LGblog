<template class="Home">
<transition name="fade">
  <div class="wrapper">
  <div class="content-title">
    {{msg}}
  </div>
<p>原生的上拉加载</p>
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
        	<!-- str = '<ul style="width:100px;height:200px;border:1px solid red;"><li>11111111</li></ul>';
        	document.getElementById('main').innerHTML += str; -->
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
        msg:'博文'
      }
    }
  }
</script>
<style scoped>
 *{
     font-family: '微软雅黑';
 }

</style>
