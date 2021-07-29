import Home from './Pages/Home.vue';
import AboutPage from './Pages/AboutPage.vue';
import notfound from './Pages/404.vue'; 
import login from './Auth/Login.vue'; 
import register from './Auth/Register.vue'; 
import Dashboard from './Pages/Dashboard.vue';
import DataProducts from './Pages/Admin/DataProducts.vue';
import OrderList from './Pages/Admin/OrderList.vue';
import Products from './Pages/Products/Products.vue';
import Delivery from './Pages/Products/DeliveryDetails.vue';
import Payment from './Pages/Payment/PaymentGateway.vue';

export default{
    mode: 'history',
    routes:[

        {
            path:'/',
            component:Home,
            name:'home',
            
            children: [
                {
                    path:'/AboutUs',
                    component:AboutPage,
                },

                {
                    path:'/Login',
                    component:login,
                    name:'/login_'
                },

                {
                    path:'/Register',
                    component:register,
                },

                {
                    path:'/Dashboard',
                    component:Dashboard,
                    name:'Dashboard',
                    beforeEnter:(to,from,next)=>{
                        axios.get('api/Authenticated').then(()=>{
                            next()
                            
                        }).catch(()=>{
                            return next({name: '/login_'})
                        })
                    }
                },

                {
                    path:'/DataProducts',
                    component:DataProducts,
                    name:'DataProducts',
                    beforeEnter:(to,from,next)=>{
                        axios.get('api/Authenticated').then(()=>{
                            next()
                            
                        }).catch(()=>{
                            return next({name: '/login_'})
                        })
                    }
                },
                
                {
                    path:'/OrderList',
                    component:OrderList,
                    name:'OrderList',
                    beforeEnter:(to,from,next)=>{
                        axios.get('api/Authenticated').then(()=>{
                            next()
                            
                        }).catch(()=>{
                            return next({name: '/login_'})
                        })
                    }
                },

                {
                    path:'/Products',
                    component:Products,
                },

                {
                    path:'/Delivery',
                    component:Delivery,
                    name:'Delivery',
                },

                {
                    path:'/Payment',
                    component:Payment,
                    name:'Payment',
                },


                {
                    path:'*',
                    component:notfound,
                },

            ]
        },

       


    ]
}