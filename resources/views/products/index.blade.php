@extends('layouts.app')

@section('content')

<div class="container">
	<h1>{{$shopping_cart}}</h1>
	<div class="row">
		<products-component></products-component>
	</div>
	<div class="actions">
		{{$products->links()}}
	</div>
</div>
@endsection