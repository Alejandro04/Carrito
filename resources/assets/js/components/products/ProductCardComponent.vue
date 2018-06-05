<template>
	<div class="card" style="width: 18rem; margin:5px">
		<div class="card-body">
			<h5 class="card-title">{{product.title}}</h5>
			<p class="card-text">{{product.description}}</p>
			<p>{{product.price}}</p>
			<a :href="'/products/'+ product.id" class="btn btn-primary">Ver</a>
		</div>
	</div>
</template>



<script>
	export default{
		props: {
			product: {
				type: Object
			}
		}
	}
</script>