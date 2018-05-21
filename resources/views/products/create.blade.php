@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <h2>Registro de Productos</h2>
            <a href="/products" class="btn btn-info">Volver</a>
        </div>    
    </div>

    <div class="row">
     	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	    	<form class="form" action="/products" method="POST" style="padding: 20px;">	
	    		{{ csrf_field() }}	
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
	            <div class="form-group">
	            	<label>Title</label>
		       		<input type="text" name="title" class="form-control" placeholder="title">
		       		<label>Price</label>
		       		<input type="text" name="price" class="form-control" placeholder="price" value="0">
		       		<label>Description</label>
		       		<textarea name="description" class="form-control" placeholder="Description"></textarea>
	       		</div>
	            <button type="submit" class="btn btn-info" style="margin-top: 10px">Registrar</button>
	        </form>
        </div>
    </div>
</div>

@endsection
