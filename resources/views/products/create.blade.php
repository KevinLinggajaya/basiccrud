@extends('layout.master')

@section('title')
	{{ env('TITLE') }} - Create Product
@stop

@section('content')
	<h1>Create Product</h1>
	<hr>
	@include('products.form')
@stop