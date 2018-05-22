<form class="form" action="{{ route('products.destroy', $product->id) }}" method="POST" style="padding: 20px;" onsubmit="return confirm('Seguro que desea eliminar este item?')">	
	{{ csrf_field() }}	
	{{ method_field('DELETE')}}   
	<button type="submit" name="Eliminar" class="btn btn-danger">Eliminar</button>
</form>
