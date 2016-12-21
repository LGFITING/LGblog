<template class="News">
    <transition name="fade">
    <div class="wrapper">
        <div class="reportText" v-if="showArea">
            <textarea name="name" rows="8" cols="70" ref="textarea" id="textarea" autofocus></textarea>
            <button type="button" name="button" v-on:click="complete">完成</button>
            <button type="button" name="button" v-on:click="closeArea">取消</button>
        </div>
        <div class="content-title">
                {{msg}}
        </div>
        <label for="report"><i  id="report" v-on:click="openReport">我要发表</i></label>
        <img src="static/images/report.png" alt="" width="26" style="float:left;">
        <div id="content-con">
        </div>
</div>
  </transition>
</template>
<script type="text/javascript">
  export default{
    data(){
      return{
        msg:'图文心情',
        showArea:false,
        textContent:null
      }
  },
  ready(){
        this.$http.post('url').then((response) => {
            //success
        },(response) => {
            //error
        });
  },
  methods:{
      openReport:function(){
          this.showArea = true;

      },
      closeArea:function () {
          this.showArea = false;
      },
      complete:function () {
          var content = document.getElementById('content-con');
          var article = document.createElement('p');
          content.appendChild(article);
          this.textContent = this.$refs.textarea.value;
          article.setAttribute("style","background:#fff;margin:20px 0px;text-indent:2em;line-height:20px;font-size16px;padding:4px;");
          article.innerHTML = this.textContent;
          this.showArea = false;
      }
  }
  }
</script>
<style media="screen" scoped>
#report{
    line-height:27px;
    font-weight:bold;
    cursor:pointer;
    animation: change 1s  ease-in  infinite ;
}
@keyframes change {
    0%{ text-shadow: 0 0 4px #f00}
    50%{ text-shadow: 0 0 40px #f00}
    100%{ text-shadow: 0 0 4px #f00}
}
.reportText{
    background: #ECECEC;
    border-radius: 5px;
    padding: 10px;
    width: 490px;
    height: 160px;
    position: fixed;
    margin-left: 100px;
    box-shadow: 0 0 3px #000;
}
.reportText textarea{
    border: none;
    outline: none;
    font-size: 14px;
}
.reportText button{
    float:right;
    margin:4px 10px 10px 10px;
    width: 40px;
    height: 24px;
    outline: none;
    background: #42b983;
    border: none;
    font: 12px;
    font-weight: 300;
    cursor: pointer;
    color: #fff;
}
#content-con{
    margin: -20px 10px 10px 10px;
    padding: 10px;
}
</style>
