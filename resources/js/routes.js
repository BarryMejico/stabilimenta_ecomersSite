import Home from './Pages/Home';
import AboutPage from './Pages/AboutPage';
import notfound from './Pages/404'; 
import login from './Auth/Login'; 
import register from './Auth/Register'; 
import Dashboard from './Pages/Dashboard';
import DataProducts from './Pages/Admin/DataProducts';
import OrderList from './Pages/Admin/OrderList';
import Products from './Pages/Products/Products';
import Delivery from './Pages/Products/DeliveryDetails';
import Payment from './Pages/Payment/PaymentGateway';

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