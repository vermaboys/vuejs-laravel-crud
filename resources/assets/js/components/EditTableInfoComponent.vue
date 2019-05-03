<template>
    <section class="blog-me pt-50 pb-50" id="blog">
        <div class="container">
            <div class="row centered-form">
                <div class="col-md-12">
                    <div class="">
                        <div class="">
                            <h3 class="text-white">Edit Info</h3>
                        </div>
                        <div  :class="{ removeErr: removeErr==1, 'alert alert-danger': hasError==1 }" v-if="errors.length > 0">
                            <ul>
                                <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </div>
                        <form role="form">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="text-white">First Name</label>
                                    <div class="form-group">
                                        <input type="text" name="first_name" id="first_name" class="form-control input-sm" v-model="table.first_name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="text-white">Last Name</label>
                                    <div class="form-group">
                                         <input type="text" name="last_name" id="last_name" class="form-control input-sm" v-model="table.last_name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="text-white">Age</label>
                                    <div class="form-group">
                                         <input type="text" name="age" id="age" class="form-control input-sm" v-model="table.age">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="text-white">City</label>
                                    <div class="form-group">
                                         <input type="text" name="city" id="city" class="form-control input-sm" v-model="table.city">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="text-white">Country</label>
                                    <div class="form-group">
                                         <input type="text" name="country" id="country" class="form-control input-sm" v-model="table.country">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <input type="button" value="Submit" class="submit-form"  @click="updateInfo">
                                </div>
                                <div class="col-md-1">
                                    <router-link to="/table" class="cancel">Cancel</router-link>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>


<script>
    export default {
        data(){
            return {
                
                table:[],
                errors:[],
                removeErr:'',
                hasError:''

            }
        },
        mounted(){
            this.getInfo();
        },
        methods: {
           
            getInfo(){
                axios.get('./info-edit/'+this.$route.params.id)
                .then(response => {
                  this.table=response.data.data[0];
                });
            },
            updateInfo(){
               axios.post('./update-info/' + this.$route.params.id, {
                   first_name:this.table.first_name,
                   last_name:this.table.last_name,
                   age:this.table.age,
                   city:this.table.city,
                   country:this.table.country
                })
                .then(response => {
                    this.removeErr=1;
                    this.hasError=0;
                    this.$swal({
                      title: 'Successfully Updated',
                      type: 'success',
                      confirmButtonText: 'ok',
                      confirmButtonColor: '#39367d'
                    })
                })
                .catch(error => {
                    this.errors = [];
                    this.removeErr=0;
                    this.hasError=1;
                        if (error.response.data.errors.first_name) {
                            this.errors.push(error.response.data.errors.first_name[0]);
                        }

                        if (error.response.data.errors.last_name) {
                            this.errors.push(error.response.data.errors.last_name[0]);
                        }
                        if (error.response.data.errors.age) {
                            this.errors.push(error.response.data.errors.age[0]);
                        }
                        if (error.response.data.errors.city) {
                            this.errors.push(error.response.data.errors.city[0]);
                        }
                        if (error.response.data.errors.country) {
                            this.errors.push(error.response.data.errors.country[0]);
                        }
                })     
            }
        }
    }
</script>