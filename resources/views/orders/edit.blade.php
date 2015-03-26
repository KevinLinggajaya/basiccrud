@extends('layout.master')

@section('title')
	{{ env('TITLE') }} - Edit Order
@stop

@section('content')
	<h1>Edit Order</h1>
	<hr>
	@include('orders.form', [
		"formUrl" => action('OrderController@update', $order->id),
		"method" => "put"
	])
@stop