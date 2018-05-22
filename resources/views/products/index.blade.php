@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		@if(Session::has('flash_message'))
            <p class="alert alert-success">{{ Session::get('flash_message') }}</p>
        @endif
        @if ($errors->any())
            <div class="form-group @if ($errors->any()) has-danger @endif">
	            @foreach ($errors->all() as $error)
	                <div class="form-control" style="border-color: #FF4136; color: #FF4136;">{{ $error }}</div>
	             @endforeach
                    </div>
        @endif	
		@foreach($products as $product)
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="card" style="padding: 20px; margin-bottom: 20px;">
					<header>
						<h2 class="card-title">
							<a href="/products/{{$product->id}}">{{$product->title}}</a>
						</h2>
						<h4 class="card-subtitle">{{$product->price}}</h4>
					</header>
					<p class="card-text">{{$product->description}}</p>
				</div>
			</div>
		@endforeach
	</div>
	<div class="actions">
		{{$products->links()}}
	</div>
</div>
@endsection