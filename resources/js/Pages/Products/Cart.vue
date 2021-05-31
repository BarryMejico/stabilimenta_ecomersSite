<template>
    <div>
        
        cards of products 
        <button @click="Cout">Check Out</button>
        
        
    </div>
</template> 
<script>
export default {
    methods:{
        Cout(){
            this.$router.push({name:"Delivery"});
        },
    },
}
</script>