@extends('layout.master')

@section('title')
	{{ env('TITLE') }} - Create Order
@stop

@section('content')
	<h1>Create Order</h1>
	<hr>
	@include('orders.form', [
		"formUrl" => action('OrderController@store'),
		"method" => "post"
	])
@stop