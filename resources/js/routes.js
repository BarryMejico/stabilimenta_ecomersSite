import Home from './Pages/Home';
import AboutPage from './Pages/AboutPage';
import notfound from './Pages/404'; 
import login from './Auth/Login'; 
import register from './Auth/Register'; 
export default{
    mode: 'history',
    routes:[

        {
            path:'/',
            component:Home,
            
            children: [
                {
                    path:'/AboutUs',
                    component:AboutPage,
                },

                {
                    path:'/Login',
                    component:login,
                },

                {
                    path:'/Register',
                    component:register,
                },

                {
                    path:'*',
                    component:notfound,
                },
            ]
        },

       


    ]
}