<template>
    <div>
        Dashboard
        <button @click="logout">Logout</button>
    </div>  
</template>
<script>
export default {
    methods:{
        logout(){
            axios.post('/api/logout')
            .then(()=>{
                this.$router.push({name:"home"});
            })

        },
    }
}
</script>