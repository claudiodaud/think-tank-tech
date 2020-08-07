// require dependencies
require('./bootstrap');


import Vue from 'vue';
import Router from 'vue-router';
Vue.use(Router);

//components vue 
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

//vue routers 
let router = new Router({
	routes:  [
	{
		path: '/',
		component: {
			template: '<div>este es el welcome</div>',
		}


	},
	{
		path: '/home',
		component: {
			template: '<div>este es el home</div>',
		}


	},
	{
		path: '/vip',
		component: {
			template: '<div>este es el vip</div>',
		}


	},
	{
		path: '/premium',
		component: {
			template: '<div>este es el premium</div>',
		}


	}
	]
	
});

//vue Apps
const app = new Vue({
    el: '#app',

    router    
    
});

