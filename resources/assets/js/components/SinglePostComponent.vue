<template>
  <section class="blog-me pt-50 pb-50" id="blog">
     <div class="container">
        <div class="row">
           <div class="col-md-12 mt-30">
              <div class="single-blog-section">
                 <div class="single-blog-section-img">
                    <img :src="'public/images/' + post[0].image"/>
                    <div class="post-date">
                       <span>{{ReformatDate( post[0].created_at)}}</span>
                    </div>
                 </div>
                 <div class="single-blog-content">
                    <div class="single-blog-title">
                       <h4>{{ post[0].title }}</h4>
                    </div>
                    <p>{{ post[0].description }}</p>
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
                post: []

            }
        },
        mounted() {
            this.readPosts();
        },
        methods: {
            readPosts(){
                axios.get('./single-post/'+this.$route.params.id)
                .then(response => {
                  this.post = response.data.post;
                });
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