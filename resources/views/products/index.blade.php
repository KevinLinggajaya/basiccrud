@extends('layout.master')

@section('title')
	{{ env('TITLE') }} - Product
@stop

@section('content')
	<h1>List Products</h1>
	<hr>
	<div class="panel panel-default">
		<div class="panel-heading">
			<a class="btn btn-primary" href="{{ action('ProductController@create')}}">Add New Product</a>
		</div>
	</div>

	<div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>Name</th>
					<th>Code</th>
					<th class="text-center">Total Variation</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($products as $product) 
				<tr>
					<td>{{$product->name}}</td>
					<td>{{$product->code}}</td>
					<td class="text-center">
						{{$product->variation}}
					</td>
					<td class="col-sm-1 nowrap">
						<a class="btn btn-warning btn-xs" href="{{ action('ProductController@edit', $product->id) }}" >Edit</a> 
			   			{!! Form::open(array('url' => action('ProductController@destroy', $product->id), 'class' => 'form-delete')) !!}
			   			{!! Form::hidden('_method', 'delete') !!}
			        		<button type="submit" class="btn btn-danger btn-xs">Delete</button>
			    		{!! Form::close() !!}
			    	</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@include('layout.pagination', ['page' => $products])
@stop