@extends('reports.index')

@section('title')
	{{ env('TITLE') }} - Report
@stop

@section('reportDetail')
	<div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>Product Name</th>
					<th>Product Details</th>
					<th class="text-right">Price/Item (IDR)</th>
					<th class="text-right">Quantity</th>
					<th class="text-right">Total Sales (IDR)</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($orders as $order) 
				<tr>
					<td>{{$order->name}}</td>
					<td>{{$order->size . " | " . $order->color}}</td>
					<td class="text-right">{{$order->price}}</td>
					<td class="text-right">{{$order->quantity}}</td>
					<td class="text-right">{{number_format($order->total_sales, 2)}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop