<template class="Classify">
<div id="article-cate">
<div class="aa" v-on:click="getSelect">
    {{msg}}：
    <select v-model="selected">
        <option v-for="option in options" v-bind:value="option.value" v-bind:id="option.id">
            {{option.text}}
        </option>
    </select>
</div>
</div>
</template>
<script type="text/javascript">
  export default{
    data(){
      return{
        msg:'选择分类',
         selected: 'A',
         options: []
  }
  },
  methods:{
      getSelect:function(){
          this.options=[{text:'娱乐',value:'A',id:1},{text:'新闻',value:'B',id:2},{text:'科学',value:'C',id:3}];
          console.log(this);
      },
      getId:function(){

      }
  }
  }
</script>
<style scoped>
/*文章分类*/
#article-cate{
 border:1px solid red;
 width: 240px;
 height: 300px;
}

</style>
