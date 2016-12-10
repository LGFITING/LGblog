<template class="Service">
<transition name="fade">
  <div class="wrapper">
  <div class="content-title">
    {{msg}}
  </div>
</div>
<transition>
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
<style scoped>

</style>
