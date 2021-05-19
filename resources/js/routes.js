import Home from './Pages/Home';
import AboutPage from './Pages/AboutPage';
import notfound from './Pages/404'; 
import login from './Auth/Login'; 
import register from './Auth/Register'; 
import Dashboard from './Pages/Dashboard';

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
                    path:'*',
                    component:notfound,
                },

            ]
        },

       


    ]
}