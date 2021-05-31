<template>
    <div>
        <h2>Products</h2>
        cards of products 
        <button> Addu to Cartu</button>
        <hr>
        <h2>Cart</h2>
        <Cart></Cart>
        
    </div>
</template> 
<script>
import Cart from './Cart'
export default {
    components:{
        Cart,
       
    },
}
</script>