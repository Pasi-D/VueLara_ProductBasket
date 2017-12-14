import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Addproduct from './components/Addproduct.vue'
import About from './components/About.vue'
import Product from './components/Product.vue'
import Home from './components/Home.vue'
import Contact from './components/Contact.vue'
import Edit from './components/Edit.vue'

const router = new VueRouter({

	mode:'history',

	routes:[
		{
			path:"",
			component:Home
		},
		{
			path:"/product",
			component:Product
		},
		{
			path:"/add",
			component:Addproduct
		},
		{
			path:"/about",
			component:About
		},
		{
			path:"/contact",
			component:Contact
		},
		{
			path:"/edit/:id",
			component:Edit
		},
	]
})

export default router