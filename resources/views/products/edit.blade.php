@extends('layout.master')

@section('title')
	{{ env('TITLE') }} - Edit Product
@stop

@section('content')
	<h1>Edit Product</h1>
	<hr>
	@include('products.form')
@stop