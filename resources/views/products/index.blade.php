@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<products-component></products-component>
	</div>
	<div class="actions">
		{{$products->links()}}
	</div>
</div>
@endsection