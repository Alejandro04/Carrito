<template>
	<div class="row">
		<product-card-component :key="product.id" v-bind:product="product" v-for="product in products"></product-card-component>
	</div>
</template>

<script>
	export default {
		data(){
			return{
				name: 'ok',
				products: [],
				endpoint: "/products"
			}
		},
		created(){
			this.fetchProducts()
		},
		methods: {
			fetchProducts(){
				axios.get(this.endpoint).then((response)=>{
					console.log(response.data.data)
					this.products = response.data.data
				})
			}
		}
	}
</script>