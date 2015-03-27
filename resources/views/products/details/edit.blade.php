@extends('layout.master')

@section('title')
	{{ env('TITLE') }} - Edit Product Details
@stop

@section('content')
	<h1>Edit Product Details</h1>
	<h3>Product : {{ $product->name }}</h3>
	<hr>
	@include('products.details.form')
@stop