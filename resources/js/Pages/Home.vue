<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            Store Name or Icon
             <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <router-link to='/'>Home Page</router-link>
                </li>

                <li class="nav-item">
                    <router-link to='/AboutUs'>About Us</router-link>
                </li>

                 <li class="nav-item">
                    <router-link to='/Login'>Log in</router-link>
                </li>
                 <li class="nav-item">
                    <router-link to='/Register'>Register</router-link>
                </li>
                <li class="nav-item">
                    Search: <input type="text">
                </li>
                

            </ul>
        </nav>
       
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
           Admin Pages
             <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <router-link to='/Dashboard'>Dashboard</router-link>
                </li>

                <li class="nav-item">
                    <router-link to='/DataProducts'>Crud Products</router-link>
                </li>

                <li class="nav-item">
                    <router-link to='/OrderList'>Orders Page</router-link>
                </li>

            </ul>
        </nav>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
           Customer Pages
             <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <router-link to='/Products'>Products--</router-link>
                </li>

                <li class="nav-item">
                    <router-link to='/Cart'>Cart</router-link>
                </li>

                <li class="nav-item">
                    <router-link to='/Payment'>Payment Gateway</router-link>
                </li>

                

                 <li class="nav-item">
                    <router-link to='/Products'>Delivery Details</router-link>
                </li>

            </ul>
        </nav>



    <div>
        <hr>
        <router-view></router-view>
    </div>
    <hr>
<ownFooter></ownFooter>
    </div>
</template>

<script>
import ownFooter from './footer'
export default {
    components:{
        ownFooter,
    }
}
</script>