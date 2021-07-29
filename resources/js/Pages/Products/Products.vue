<template>
    <div>
        <h2>Products</h2>
        <product-card @addtocart="passtocart"></product-card>
        <hr>
        <cart v-bind:item="datatopass"></cart>
        
    </div>
</template> 
<script>
import Cart from '../cart/cart.vue'
import ProductCard from './ProductCard.vue'

export default {
    components:{
        Cart,
        ProductCard
    },

    data(){
        return{
            datatopass:[],
        }
    },

    methods:{
    passtocart(event){
        
        this.datatopass=event;
        console.log(this.datatopass);

    },
    },
}
</script>