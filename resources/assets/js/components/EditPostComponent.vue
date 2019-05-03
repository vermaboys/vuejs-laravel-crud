<template>
  <section class="blog-me pt-50 pb-50" id="blog">
      <div class="container">
        <div class="row centered-form">
            <div class="col-md-12">
                <div class="">
                    <div class="">
                        <h3 class="text-white">Edit Post</h3>
                    </div>
                    <div  :class="{ removeErr: removeErr==1, 'alert alert-danger': hasError==1 }">
                        <ul>
                            <li v-for="error in errors">{{ error[0]}}</li>
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
                              <img v-bind:src="imagePreview" v-show="showPreview"/>
                              <img :src="'public/images/' + file" v-if="showPreview==false">
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-md-1">
                              <input type="button" value="Submit" class="submit-form" @click="updatePost">
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
        showPreview: false,
        imagePreview: '',
        removeErr:'',
        hasError:''
      }
    },
    mounted(){
        this.readPosts();
    },
    methods: {
      /*
        Submits the file to the server
      */
       readPosts(){
          axios.get('./post-edit/'+this.$route.params.id)
              .then(response => {
              this.title=response.data.post[0].title;
              this.description=response.data.post[0].description;
              this.file=response.data.post[0].image;
              });
      },updatePost(){
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
          Make the request to the POST /single-file URL
        */
            axios.post( './post-update/' + this.$route.params.id,
                formData,
                {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
              }
            ).then(response => {

              if(response.data.isvalid == false){ 
                this.removeErr=0;
                this.hasError=1;
                this.errors = response.data.errors;
              }else{
                this.removeErr=1;
                this.hasError=0;
                this.$swal({
                    title: 'Successfully Updated',
                    type: 'success',
                    confirmButtonText: 'ok',
                    confirmButtonColor: '#39367d'
                })
              }
             })
        .catch(error =>{
            
        });
      },

      /*
        Handles a change on the file upload
      */
      handleFileUpload(){
       /*
          Set the local file variable to what the user has selected.
        */
        this.file = this.$refs.file.files[0];

        /*
          Initialize a File Reader object
        */
        let reader  = new FileReader();

        /*
          Add an event listener to the reader that when the file
          has been loaded, we flag the show preview as true and set the
          image to be what was read from the reader.
        */
        reader.addEventListener("load", function () {
          this.showPreview = true;
          this.imagePreview = reader.result;
        }.bind(this), false);

        /*
          Check to see if the file is not empty.
        */
        if( this.file ){
          /*
            Ensure the file is an image file.
          */
          if ( /\.(jpe?g|png)$/i.test( this.file.name ) ) {

            /*
              Fire the readAsDataURL method which will read the file in and
              upon completion fire a 'load' event which we will listen to and
              display the image in the preview.
            */
            reader.readAsDataURL( this.file );
          }
        }

      }
    }
  }
</script>