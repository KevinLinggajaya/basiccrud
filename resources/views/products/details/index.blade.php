@extends('layout.master')

@section('title')
	{{ env('TITLE') }} - Product Details
@stop

@section('content')
	<h1>List Product Details</h1>
	<h3>Product : {{ $product->name }}</h3>
	<hr>
	<div class="panel panel-default">
		<div class="panel-heading">
			<a class="btn btn-info" href="{{ action('ProductController@index') }}"><span class="glyphicon glyphicon-arrow-left"></span> Back to Product List</a>
			<a class="btn btn-primary" href="{{ action('ProductDetailController@create', $product->id) }}">Add New Product Details</a>
		</div>
	</div>

	<div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>Size</th>
					<th>Color</th>
					<th class="text-right">Quantity</th>
					<th class="text-right">Price (IDR)</th>
					<th class="text-center">Is Enabled</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($productDetails as $productDetail) 
				<tr>
					<td>{{$productDetail->size}}</td>
					<td>{{$productDetail->color}}</td>
					<td class="text-right">{{$productDetail->quantity}}</td>
					<td class="text-right">{{ number_format($productDetail->price, 2) }}</td>
					<td class="text-center"> 
						@if($productDetail->is_enabled)
							<span class="glyphicon glyphicon-ok true"></span>
						@else
							<span class="glyphicon glyphicon-remove false"></span>	
						@endif
					</td>
					<td class="col-sm-2 nowrap">
						<a class="btn btn-warning btn-xs" href="{{ action('ProductDetailController@edit', [$product->id, $productDetail->id]) }}" >Edit</a> 
			   			{!! Form::open(array('url' => action('ProductDetailController@destroy', [$product->id, $productDetail->id]), 'class' => 'form-delete')) !!}
			   			{!! Form::hidden('_method', 'delete') !!}
			        		<button type="submit" class="btn btn-danger btn-xs">Delete</button>
			    		{!! Form::close() !!}
			    	</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@include('layout.pagination', ['page' => $productDetails])
@stop