<template class="Aboutus">
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
        msg:'关于我'
      }
    }
  }
</script>
<style scoped>

</style>
