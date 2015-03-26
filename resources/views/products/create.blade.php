@extends('layout.master')

@section('title')
	{{ env('TITLE') }} - Create
@stop

@section('content')
	<h1>Create Product</h1>
	@include('products.form')
@stop