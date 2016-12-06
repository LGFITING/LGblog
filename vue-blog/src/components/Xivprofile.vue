<template class="Xivprofile">
  <div class="profile">
  <div class="title">
    <p>
      个人资料
    </p>
    <img src="static/images/lg.jpg" alt="ME" width="100" id="ME">
  </div>
  <div class="">

  </div>
</div>
</template>
<script type="text/javascript">
  export default{
    data(){
      return{
        msg:'Service'
      }
    }
  }
</script>
<style media="screen" scoped>
.profile{
  border: 1px solid red;
  width: 220px;
  height: 500px;
  background: #fff;
}
.title p{
  background: #ECECEC;
  height: 20px;
  vertical-align: middle;
  color: #66666a;
  font-size: 12px;
  font-weight: bold;
  margin: 3px;
  line-height: 22px;
}
#ME{
    border-radius: 50%;
    margin: 20px;
}
</style>
