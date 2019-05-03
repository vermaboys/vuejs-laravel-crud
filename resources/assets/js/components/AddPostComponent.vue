<template>
<section class="blog-me pt-50 pb-50" id="blog">
	<div class="container">
    <div class="row centered-form">
    	<div class="col-md-12">
    		<div class="">
    			<div class="">
	    		   <h3 class="text-white">Add New Post</h3>
	 		    </div>
 		      <div  :class="{ removeErr: removeErr==1, 'alert alert-danger': hasError==1 }" v-if="errors.length > 0">
              <ul>
                  <li v-for="error in errors">{{ error }}</li>
              </ul>
          </div>
			 		<form role="form">
		    			<div class="row">
		    				<div class="col-md-12">
		    					<label class="text-white">Title</label>
		    					<div class="form-group">
		    						<input type="text" name="title" id="title" class="form-control input-sm" v-model="title">
		    					</div>
		    				</div>
		    				<div class="col-md-12">
		    					<label class="text-white">Description</label>
		    					<div class="form-group">
		    						 <textarea name="description" id="description" class="form-control input-sm" v-model="description"></textarea>
		    					</div>
		    				</div>
			    			<div class="col-md-12">
		    					<label class="text-white">Image</label>
		    					<div class="form-group">
		    						<input type="file" id="file" ref="file"  v-if="file" v-on:change="handleFileUpload()"/>
		    					</div>
			    			</div>
              </div>
			    		<div class="row">
			    			<div class="col-md-1">
			    				<input type="button" value="Submit" class="submit-form" @click="createPost">
                </div>
			    			<div class="col-md-1">
			    				<router-link to="/" class="cancel">Cancel</router-link>
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
  /*
      Defines the data used by the component
    */
    data(){
      return {
      	errors: [],
        file: true,
        title:'',
        description:'',
        removeErr:'',
        hasError:''
      }
    },  
    methods: {
      /*
        Submits the file to the server
      */
      createPost(){
        /*
            Initialize the form data
        */
        let formData = new FormData();
        /*
            Add the form data we need to submit
        */
        formData.append('file', this.file);
        formData.append('title', this.title);
        formData.append('description', this.description);
        /*
          Make the request to the POST /add-post URL
        */
        axios.post( './add-post',
          formData,{
            headers: {
              'Content-Type': 'multipart/form-data'
            }
          }
        ).then(response => {
            this.removeErr=1;
            this.hasError=0;
            this.reset();
            this.$swal({
              title: 'Successfully Added',
              type: 'success',
              confirmButtonColor: '#39367d',
              confirmButtonText: 'ok'
            })
        })
        .catch(error =>{
            this.errors = [];
            this.removeErr=0;
            this.hasError=1;
            if (error.response.data.errors.title) {
                this.errors.push(error.response.data.errors.title[0]);
            }
            if (error.response.data.errors.description) {
                this.errors.push(error.response.data.errors.description[0]);
            }
            if (error.response.data.errors.file) {
                this.errors.push(error.response.data.errors.file[0]);
            }
        });
      },
      /*
        Handles a change on the file upload
      */
      handleFileUpload(){
        this.file = this.$refs.file.files[0];
      },
      reset(){
        this.title='',
        this.description='',
        this.file = false
        this.$nextTick(() => {
        this.file = true
        })
      }
    }
  }
</script>