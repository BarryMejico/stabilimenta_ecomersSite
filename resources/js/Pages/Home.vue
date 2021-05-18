<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
             <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <router-link to='/'>Home Page</router-link>
                </li>

                <li class="nav-item">
                    <router-link to='/AboutUs'>About Us</router-link>
                </li>

            </ul>
        </nav>
    <div>
        <router-view></router-view>
    </div>
    </div>
</template>