<template>
<section class="blog-me pt-50 pb-50" id="blog">
   <div class="container">
   	<router-link to="/add-new" class="add-new">Add Post</router-link>
      <div class="row">
        <div class="col-lg-4 col-md-6 mt-30"  v-for="(blogs, index) in blogs">
            <div class="single-blog">
               <div class="blog-img">
                  <img :src="'public/images/' + blogs.image"/>
                  <div class="post-date">
                     <span>{{ReformatDate(blogs.created_at)}}</span><span class="edit-delete"><router-link v-bind:to="'/edit-post/'+blogs.id">Edit</router-link> / <a href="#" v-on:click="deletePost(blogs.id)">Delete</a></span>
                  </div>
               </div>
               <div class="blog-content">
                  <div class="blog-title">
                     <h4> <router-link v-bind:to="'/single-post/'+blogs.id">{{ blogs.title }}</router-link></h4>
                  </div>
                  <p>{{ blogs.description.substring(0,170)+"...." }}</p>
                  <router-link v-bind:to="'/single-post/'+blogs.id" class="box_btn">Read More</router-link>
               </div>
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
                blogs: []
            }
      },
      mounted() {
          this.readPosts();
      },
      methods: {
            readPosts(){
              axios.get('./blogs')
              .then(response => {

                 this.blogs = response.data.blogs;
              });
            },
            deletePost: function (id) {
              this.$swal({
                title: 'Are you sure want to delete?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#39367d',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              })
              .then((result) => {
                  axios.post('./delete/' + id)
                  .then(response => {
                    this.readPosts();
                    this.$swal({
                      title: 'Successfully deleted',
                      type: 'success',
                      confirmButtonColor: '#39367d',
                      confirmButtonText: 'ok'
                    })
                  })
              })
            },
            ReformatDate(date){
              var date = new Date(date);
             
              var result = ""+this.MonthName(date.getMonth())+" "+(date.getDate() > 9 ? '' : '0')+date.getDate()+',' +date.getFullYear();

              return result;
            },
            MonthName(num){
              const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

              return monthNames[num];           
            }
      }
    }
</script>
