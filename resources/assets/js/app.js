
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
import VueSweetAlert from 'vue-sweetalert'
Vue.use(VueSweetAlert)
Vue.use(VueRouter)
const blog = require('./components/BlogComponent.vue')
const singlepost = require('./components/SinglePostComponent.vue')
const addpost = require('./components/AddPostComponent.vue')
const editpost = require('./components/EditPostComponent.vue')
const table = require('./components/TableComponent.vue')
const addinfo = require('./components/AddTableInfoComponent.vue')
const editinfo = require('./components/EditTableInfoComponent.vue')
const routes = [
{
	path:'/',
	component:blog
},
{
	path: '/single-post/:id', 
	component: singlepost
},
,
{
	path: '/add-new', 
	component: addpost
},
{
	path: '/edit-post/:id', 
	component: editpost
},
{
	path: '/table', 
	component: table
},
{
	path: '/addnewinfo', 
	component: addinfo
},
{
	path: '/edit-info/:id', 
	component: editinfo
}
];
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('navbar', require('./components/NavbarComponent.vue'));
Vue.component('myfooter', require('./components/FooterComponent.vue'));
const router = new VueRouter({
	routes
})
const app = new Vue({
    el: '#app',
    router,
});
