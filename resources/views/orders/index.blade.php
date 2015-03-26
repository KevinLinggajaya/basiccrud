@extends('layout.master')

@section('title')
	{{ env('TITLE') }} - Order
@stop

@section('content')
	<h1>List Orders</h1>
	<hr>
	<div class="panel panel-default">
		<div class="panel-heading">
			<a class="btn btn-primary" href="{{ action('OrderController@create')}}">Add New Order</a>
		</div>
	</div>

	<div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>Date</th>
					<th>Order No</th>
					<th class="text-center">Number of Product</th>
					<th class="text-right">Total Price (IDR)</th>
					<th class="col-sm-2">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($orders as $order) 
				<tr>
					<td>{{$order->created_at}}</td>
					<td>{{$order->order_no}}</td>
					<td class="text-center">
						<a href="{{ action('OrderController@show', $order->id) }}">{{$order->orderDetails()->count()}}</a>
					</td>
					<td class="text-right">{{ number_format($order->total_price, 2) }}</td>
					<td class="col-sm-2 nowrap">
						<a class="btn btn-warning btn-xs" href="{{ action('OrderController@edit', $order->id) }}" >Edit</a> 
			   			{!! Form::open(array('url' => action('OrderController@destroy', $order->id), 'class' => 'form-delete')) !!}
			   			{!! Form::hidden('_method', 'delete') !!}
			        		<button type="submit" class="btn btn-danger btn-xs">Delete</button>
			    		{!! Form::close() !!}
			    	</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@include('layout.pagination', ['page' => $orders])
@stop