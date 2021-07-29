<template>
    <div>
        <button @click="openNav()">Cart</button>
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" @click.prevent="closeNav()">&times;</a>
  
  <div class="row justify-content-center">
            <div class="col-md-8">

                <div v-for="(Product,k) in cookie" :key='k'  class="card">
                    <div class="card-header">{{Product.name}}</div>
                    <div class="card-body">
                        {{Product.id}}<br>
                        {{Product.qty}}
                    </div>
                </div>
            </div>
        </div>


</div>

        
    </div>  
</template>
<script>

export default {
   props:['item'],
    
  data(){
    return{
      cookie:[],
      items2:[
        {id:'1',name:"kame",qty:'500'},
        {id:'2',name:"Sila",qty:'300'},
        ],
    }
  },
    methods:{

      setcookie(){
        console.log(this.item)
        axios.get('api/makeCookie',{params:{laman:this.item}})
        .then((res)=>{
            this.cookie=res.data;
        })
      },

      getcookie(){
        this.cookie=[];
        axios
        .get('api/getCookie')
        .then((res)=>{
          var cookie=res.data.laman;
          for(var i in cookie)
           this.cookie.push(JSON.parse(cookie[i]));
        })
      },

      test(){
        axios.get('api/testapi')
        .then((res)=>{
          alert(res.data)
        })
      },

    


       /* Set the width of the side navigation to 250px */
openNav() {
this.getcookie();
 var a= document.getElementById("mySidenav");
  a.style.width = "25%";
  a.style.left="25%"; 
  a.style.translate= "-100%, 0";
},

/* Set the width of the side navigation to 0 */
closeNav() {
  document.getElementById("mySidenav").style.width = "0";
},
    }
}
</script>

<style scoped>
/* The side navigation menu */
.sidenav {
  height: 100%; /* 100% Full-height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background-color: #111; /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 60px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
  float: right;
  margin-left: 50%;
}

/* The navigation menu links */
.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
  color: #f1f1f1;
}

/* Position and style the close button (top right corner) */
.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
  transition: margin-left .5s;
  padding: 20px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>