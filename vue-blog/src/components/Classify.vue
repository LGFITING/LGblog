<template class="Classify">
<div id="article-cate">
<div>
    {{msg}}：
    <select v-model="selected" :class="classA">
        <option v-for="option in options" v-bind:value="option.sort_article_id">
            {{option.sort_article_name}}
        </option>
    </select>
</div>
<ul class="article">
  <li v-for="item in items">
    <a>{{ item.article_name }}</a>
  </li>
</ul>
</div>
</template>
<script type="text/javascript">
  export default{
    data(){
      return{
        msg:'选择分类',
         selected: 1,
         options: [],
         classA:'',
         items:''
  }
  },
  mounted(){
      //数据请求
      var that=this;
      that.$http.get('http://lg.blog.com/index.php/Blog/articleDepend'
                              ,{emulateJSON:true}).then(function (response) {
                                 let data = JSON.parse(response.body);
                                 this.options = data;
                                 console.log(data);

                      }, function (response) {

            });
      this.classA = 'class-a';
  },
  methods:{
      getSelect:function(){

      },
      getId:function(){

      }
  },
  watch:{
      //监听model ,类似于jq中的change
      selected(){
          //数据请求
          console.log(this.selected);
          let vm=this;
          vm.$http.post('http://lg.blog.com/index.php/Blog/getArticleTitle'
                                  ,{"article_id":this.selected},{emulateJSON:true}).then(function (response) {
                                      let data = JSON.parse(response.body);
                                      if(data==''){
                                          data = [{article_name:'无相关文章'}]
                                      }
                                      this.items = data;
                          }, function (response) {
                              alert('服务器繁忙');
                });
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
    height: 20px;
    line-height:20px;
}
.article{
    text-align:left;
    margin:8px 5px;
}
.article li{
    margin:2px 5px;
}
.article a{
    color:#194DFB;
    cursor:pointer;
}
.article a:hover{
    color:#6AC3FF;
}
</style>
