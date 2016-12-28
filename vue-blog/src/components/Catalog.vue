<template class="Catalog">
 <transition name="fade">
  <div class="wrapper">
  <div class="content-title">
    {{msg}}
  </div>
  <div class="content">
      <ul id="blogArticle">
          <li v-for="(item,index) in items" v-on:click="addIcon(index)">
              {{item.message}}{{click}}
          </li>
      </ul>
  </div>
</div>
 </keep-alive>
  </transition>
</template>
<script type="text/javascript">
  export default{
    data(){
      return{
        msg:'博文记事',
        click:'a',
        items:[
            {message:'第一条'},
            {message:'第二条'}
        ]
      }
  },
  methods:{
      addIcon:function(index){
          this.click = index;
          alert(this.click);
      }
  }
  }
</script>
<style scoped>
 #blogArticle li{
     cursor: pointer;
 }
</style>
