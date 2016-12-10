<template class="News">
    <transition name="fade">
    <div class="wrapper">
        <div class="content-title">
                {{msg}}
        </div>
</div>
  </transition>
</template>
<script type="text/javascript">
  export default{
    data(){
      return{
        msg:'图文心情'
      }
    }
  }
</script>
<style media="screen" scoped>

</style>
