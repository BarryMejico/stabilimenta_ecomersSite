<template>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header" style="text-align:center;">
                 
                        <h4 style="margin:5px;"><b>Login</b></h4>
              
                    </div>
                <br>
                <br>

                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <label for="email"  class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-7">
                                <input id="email" v-model="log.email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" autofocus> 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-7">
                                <input id="password" v-model="log.password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">  
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">

                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-7 offset-md-4">
                                <button @click.prevent="login" action="" class="btn btn-primary" >
                                    Login
                                </button>     
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
       
    </div>
</div>
</template>
<script>

import Swal from 'sweetalert2'

export default {
  
    data() {
      return{
      log:{
        email:'',
        password:'',
      },
      errors:[],
      message:{
          visibility:false,
          head:'',
          insdide:'',
          errors:{},
      },
    }},

    methods:{
        login(){

        axios.post('/api/login', this.log)
        .then(()=>{
                Swal.fire({
                title: 'Login Successfully',
                icon: 'success',
                timer:2000,
                showCancelButton: false,
                showConfirmButton:false
            })
            this.$router.push({name:"Dashboard"});
             })
        .catch((error)=>{
                this.message.errors=error.response.data;
                this.message.insdide="Please check these errors before proceeding!";
                this.message.head="Error!";
                this.message.visibility=true;
                console.log(this.errors);

                Swal.fire({
                title: 'Oops!',
                text: this.message.errors.message + ' ' + this.message.insdide,
                icon: 'warning',
                showCancelButton: false,
                showConfirmButton:true
            
              })
            })


   
        }
    }
}
</script>