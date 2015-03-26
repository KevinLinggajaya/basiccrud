@extends('layout.master')

@section('title')
	{{ env('TITLE') }} - Create Product Details
@stop

@section('content')
	<h1>Create Product Details</h1>
	<hr>
	@include('products.details.form')
@stop