<template>
  <section class="blog-me pt-50 pb-50" id="blog">
         <div class="container">
            <div class="row mb-50">
              <router-link to="/addnewinfo" class="add-new">Add New</router-link>
            </div>
            <div class="row">
              <div class="table-responsive">          
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Age</th>
                      <th>City</th>
                      <th>Country</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr  v-for="(val, key) in table.data">
                    	<td>{{val.first_name}}</td>
                      <td>{{val.last_name}}</td>
                      <td>{{val.age}}</td>
                      <td>{{val.city}}</td>
                      <td>{{val.country}}</td>
                      <td><router-link v-bind:to="'/edit-info/'+val.id">Edit</router-link></td>
                      <td><a href="#" v-on:click="deleteRecord(val.id)">Delete</a></td>
                    </tr>
                  </tbody>
                </table>
                <nav aria-label="Page navigation example" v-if="table.data.length > 0">
                  <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#"  @click.prevent="readInfo(prev_page_url)">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">{{current_page}} / {{last_page}}</a></li>
                    <li class="page-item"><a class="page-link" href="#" @click.prevent="readInfo(next_page_url)">Next</a></li>
                  </ul>
                </nav>
              </div>
            </div>
        </div>
  </section>
</template>

<script>
    export default {
        data(){
            return {
                table: [],
                first_page_url:'',
                last_page:'',
                total:'',
                last_page_url:'',
                next_page_url:'',
                prev_page_url:'',
                to:'',
                current_page:'',
                url:''
            }
        },
        mounted() {
            this.readInfo();
        },
        methods: {
          readInfo(page_link){
              this.url=page_link || './table';
              axios.get(this.url)
              .then(response => {
                 this.table = response.data.data;
                 this.total=response.data.data.total;
                 this.first_page_url=response.data.data.first_page_url;
                 this.last_page=response.data.data.last_page;
                 this.last_page_url=response.data.data.last_page_url;
                 this.next_page_url=response.data.data.next_page_url;
                 this.prev_page_url=response.data.data.prev_page_url;
                 this.to=response.data.data.to;
                 this.current_page=response.data.data.current_page;
              });
          },
          deleteRecord: function (id) {
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
                    axios.post('./delete-info/' + id)
                    .then(response => {
                        this.readInfo();
                        this.$swal({
                          title: 'Successfully deleted',
                          type: 'success',
                          confirmButtonColor: '#39367d',
                          confirmButtonText: 'ok'
                        })
                    })
                })
          }

        }
    }
</script>
