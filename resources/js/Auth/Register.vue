<template>
    <div class="container">    
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header" style="text-align:center;">
                    <h4 style="margin:5px;"><b>Register</b></h4>
                    </div>
                    
                <div class="card-body">
                        <br>
                        <br>
                                       
                        <div class="form-group row">      
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-7">
                                <input v-model="form.name" id="name" type="text" class="form-control" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">  
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-7">
                                <input v-model="form.email" id="email" type="email" class="form-control" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-7">
                                <input v-model="form.password" id="password" type="password" class="form-control"  required autocomplete="new-password">   
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-7">
                                <input id="password-confirm" name="password_confirmation" v-model="form.password_confirmation" type="password" class="form-control"  required autocomplete="new-password">
                            </div>
                        </div>
                        <br>

                        <div class="form-group row mb-0">
                            <div class="col-md-7 offset-md-4">
                                <button @click.prevent="saveform" class="btn btn-primary">
                                   Register
                                </button>
                            </div>
                        </div>
                         <br>
                        <br>
                        <br>
                   
                </div>
            </div>



        </div>
        <message-box :message="message"></message-box>
    </div>
</div>
</template>
<script>

import Swal from 'sweetalert2'
function int_data(){
    return{
form:{
        name:'',
        email:'',
        password:'',
        password_confirmation:''
      },
      
      message:{
          visibility:false,
          head:'',
          insdide:'',
          errors:{},
      },
    }
}

export default {
  
    data() {
      return int_data();
      },

    methods:{ 
        saveform(){

             Swal.fire({
                title: 'Confirmation',
                text: 'Are you sure with your user informations?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
              }).then((result) => {
                if (result.value) {

                axios.post('/api/registeraccount', this.form).then(()=>{
                console.log('Save');
                this.cleardata();
                this.message.head="Sucess!";
                this.message.insdide="Sucess!";
                this.message.visibility=true;

                 Swal.fire({
              title: 'User Added Successfully',
              icon: 'success',
              timer:1500,
              showCancelButton: false,
              showConfirmButton: false 
            })

                
                
            }).catch((error)=>{
                this.message.errors=error.response.data;
                this.message.insdide="Please check these errors before proceeding!";
                this.message.head="Error!";
                this.message.visibility=true;
                console.log(this.errors);
            })
  
           
          }else if (result.dismiss === Swal.DismissReason.cancel) {
          console.log('Back to Create PO');
          }
        })

        },

        cleardata(){
                Object.assign(this.$data, this.$options.data.apply(this));
        },
    } 
}
</script>

<style>
.error-list{
    color: red;
}
</style>>