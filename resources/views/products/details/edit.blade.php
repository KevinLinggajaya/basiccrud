@extends('layout.master')

@section('title')
	{{ env('TITLE') }} - Edit Product Details
@stop

@section('content')
	<h1>Edit Product Details</h1>
	<hr>
	@include('products.details.form')
@stop