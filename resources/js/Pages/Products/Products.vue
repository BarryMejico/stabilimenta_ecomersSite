<template>
    <div>
        <h2>Products</h2>
        cards of products 
        <button> Addu to Cartu</button>
        <hr>
        
        <cart></cart>
        
    </div>
</template> 
<script>
import Cart from '../cart/cart.vue'

export default {
    components:{
        Cart
       
       
    },
}
</script>