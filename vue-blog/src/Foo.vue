<template class="Foo">
<div v-on:click = "alert" id="foo">foo</div>
</template>
<script type="text/javascript">
export default{
    data(){
        return{

        }
    },
    methods:{
        alert:function(){
          var change = document.getElementById('foo');
          change.style.color = 'yellow';
        }
    }
}
</script>
    <style lang="sass" scoped>
    $color: red;
        div{
            color:$color;
        }
    </style>
