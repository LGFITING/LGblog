<template id="Test">
 <div class="wrapper">
<p id="test">{{msg}}</p>
<hr>
<span>
  $<input ref="input" v-bind:value="value" v-on:input="updateValue($event.target.value)">
</span>
 </div>
</template>
<script type="text/javascript">
export default{
    data(){
        return{
            msg:'测试'
        }
    },
    props:['value'],
    methods:{
        updateValue:function(value){
            var formattedValue = value
            .trim()
            .slice(0,value.indexOf('.')+3)
            if (formattedValue !==value) {
                this.$refs.input.value = formattedValue
            }
            this.$emit('input',Number(formattedValue))
        }
    }
}
</script>
<style media="screen">
#test{
    font-size: 18px;
    color:#62B983;
    font-weight: bold;
}
</style>
