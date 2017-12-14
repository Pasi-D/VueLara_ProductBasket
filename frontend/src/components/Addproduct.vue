<template>
	<div class="container">
		<h2>Add Product</h2>

		<form class="form-horizontal" @submit.prevent="submitForm">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Product Name</label>
		    <input type="text"
		    	   name="productname" 
		           class="form-control" 
		           id="exampleInputEmail1" 
		           placeholder="Name"
		           v-validate="'required'"
		           v-model="item.name"
		           autofocus>
		    <div v-show="errors.has('productname')" class="help-block alert alert-danger">
		    	 {{ errors.first('productname') }}
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Quantity</label>
		    <input type="number"
		    	   name="Quantity" 
		    	   class="form-control" 
		    	   id="exampleInputPassword1" 
		    	   placeholder="Quantity"
		    	   v-validate="'required|max_value:5'"
		    	   v-model="item.quantity">
		    <div v-show="errors.has('Quantity')" class="help-block alert alert-danger">
		    	 {{ errors.first('Quantity') }}
		    </div>

		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Unit Price</label>
		    <input type="number" 
		    	   name="UnitPrice" 
		    	   class="form-control" 
		    	   id="exampleInputPassword1" 
		    	   placeholder="Price in $"
		    	   v-validate="'required|max_value:10'"
		    	   v-model="item.price">
		   	<div v-show="errors.has('UnitPrice')" class="help-block alert alert-danger">
		    	 {{ errors.first('UnitPrice') }}
		    </div>
		  </div>
		  
		  
		  <button 
		  		type="submit"
		  		v-show="item.name && item.price && item.quantity" 
		  		class="btn btn-default">Add to the list</button>
		</form>

	</div>
</template>

<script>
	
	export default{
		data() {
			return{
				item:{
					name:'',
					quantity:0,
					price:0
				}
			}
		},

		methods:{

			submitForm(){
				this.$http.post("http://127.0.0.1:8000/api/addItem", this.item)
					.then(function (response){
						console.log(response)
						this.$router.push('/product')
					})
			}
		}

	}

</script>