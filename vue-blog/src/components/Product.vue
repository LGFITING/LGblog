<template class="Product">
 <transition name="fade">
  <div class="wrapper">
  <div class="content-title">
    {{msg}}
  </div>
</div>
 </keep-alive>
  </transition>
</template>
<script type="text/javascript">
  export default{
    data(){
      return{
        msg:'博文记事'
      }
    }
  }
</script>
<style scoped>

</style>
