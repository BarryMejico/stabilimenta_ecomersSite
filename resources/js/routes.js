import Home from './Pages/Home';
import AboutPage from './Pages/AboutPage';
import notfound from './Pages/404'; 
export default{
    mode: 'history',
    
    routes:[

        {
            path:'*',
            component:notfound,
        },


        {
            path:'/',
            component:Home,
            
            children: [
                {
                    path:'/AboutUs',
                    component:AboutPage,
                },
            ]
        },

       


    ]
}