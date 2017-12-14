<template>
	<div class="container">
		<h2>Edit Product</h2>

		<form class="form-horizontal" @submit.prevent="updateInfo">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Product Name</label>
		    <input type="text"
		    	   name="productname"
		    	   v-model="product.name" 
		           class="form-control" 
		           id="exampleInputEmail1" 
		           placeholder="Name"
		           v-validate="'required'"		           
		           autofocus>
		    <div v-show="errors.has('productname')" class="help-block alert alert-danger">
		    	 {{ errors.first('productname') }}
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Quantity</label>
		    <input type="number"
		    	   name="Quantity"
		    	   v-model="product.quantitiy" 
		    	   class="form-control" 
		    	   id="exampleInputPassword1" 
		    	   placeholder="Quantity"
		    	   v-validate="'required|max_value:5'"
		    	   >
		    <div v-show="errors.has('Quantity')" class="help-block alert alert-danger">
		    	 {{ errors.first('Quantity') }}
		    </div>

		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Unit Price</label>
		    <input type="number" 
		    	   name="UnitPrice" 
		    	   v-model="product.price" 
		    	   class="form-control" 
		    	   id="exampleInputPassword1" 
		    	   placeholder="Price in $"
		    	   v-validate="'required|max_value:10'"
		    	   >
		   	<div v-show="errors.has('UnitPrice')" class="help-block alert alert-danger">
		    	 {{ errors.first('UnitPrice') }}
		    </div>
		  </div>
		  
		  
		  <button 
		  		type="submit"		  		
		  		class="btn btn-default">Update</button>
		</form>

	</div>

</template>

<script>

	export default{
		created(){
			this.getData();
		},

		data(){
			return{
				product:{

				}
			}
		},

		methods:{
			getData(){

				this.$http.get("http://localhost:8000/api/getItem/"+this.$route.params.id)
					.then(function (response){
						this.product = response.body.item;
					})

			},

			updateInfo(){

				this.$http.put("http://localhost:8000/api/editItem/"+this.$route.params.id,this.product)
					.then(function (response){
						this.$router.push('/product')
					})						
			}


		}
	}
	
	

</script>