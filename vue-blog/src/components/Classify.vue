<template class="Classify">
<div id="article-cate">
<div v-on:click="getSelect">
    {{msg}}：
    <select v-model="selected" :class="classA">
        <option v-for="option in options" v-bind:value="option.id">
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
         selected: '',
         options: [],
         classA:''
  }
  },
  methods:{
      getSelect:function(){
          //数据请求
          var that=this;
          that.$http.get('http://localhost/CodeIgniter/index.php/Blog/articleDepend'
                                  ,{emulateJSON:true}).then(function (response) {
                                      console.log(response)
                                    //  let data = JSON.parse(response.body);
                                    //   this.test = data.name;
                                    //   this.imgUrl = data.url;
                          }, function (response) {

                });
          this.options=[{text:'娱乐',value:1,id:1},{text:'新闻',value:2,id:2},{text:'科学',value:3,id:3}];
          this.classA = 'class-a';
      },
      getId:function(){

      }
  },
  watch:{
      //监听model ,类似于jq中的change
      selected(){
          console.log(this.selected);
      }
  }
  }
</script>
<style scoped>
/*文章分类*/
#article-cate{
 width: 240px;
 height: 300px;
 position: absolute;
margin-left:1290px;
 top:250px;
}
.class-a{
    width: 100px;
}
</style>
