<template>
    <div>
<div class="container">
  <div v-for="(Product,k) in items" :key='k' class="card">
    <div class="card-header">{{Product.name}}</div>
    <div class="card-body">
        <i>{{Product.id}}</i><br>
        image<br>
        Details
        </div> 
    <div class="card-footer">
        <input type="number" />
        <button @click.prevent="passToCart(k)">Adu tu katu</button>
    </div>
  </div>
        </div>
    </div>
</template> 
<script>


export default {
  props:{
    item:[{Array}],
    disabled: 0,
    
    },

    components:{
        
    },


     data(){
    return{
      items:[
       {id:'1',name:"Kamote",qty:'8'},
        {id:'2',name:"itlog",qty:'12'},
        ],
      cart:[],
    }
  },

  mounted(){
    this.getcookie();
  },

  methods:{
    passToCart(i){
      
      this.cart.push(this.items[i]);
      this.setcookie();
    },

    setcookie(){
        
        axios.get('api/makeCookie',{params:{laman:this.cart}})
        .then((res)=>{
            this.cookie=res.data;
        })
      },

      getcookie(){
        this.cart=[];
        axios
        .get('api/getCookie')
        .then((res)=>{
          var cookie=res.data.laman;
          for(var i in cookie)
           this.cart.push(JSON.parse(cookie[i]));
        })
      },

  },
}
</script>