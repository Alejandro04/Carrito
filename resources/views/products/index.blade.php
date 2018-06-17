@extends('layouts.app')

@section('content')

<div class="container">
	<h1></h1>
	<div class="row">
		<products-component></products-component>
	</div>
	<div class="actions">
		{{$products->links()}}
	</div>
</div>
@endsection