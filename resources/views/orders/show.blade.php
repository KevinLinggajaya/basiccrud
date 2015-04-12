@extends('layout.master')

@section('title')
	{{ env('TITLE') }} - Show Order
@stop

@section('content')
	<h1>Show Order</h1>
	<hr>
	<div class="well">
		{!! Form::open(array('class' => 'form form-horizontal')) !!}
		<div class="form-group">
			{!! Form::label("order_no", "Order No" , ['class' => 'col-md-2 control-label'])!!}
			<div class="col-md-10">
				<p class="form-control-static">{{ $order->order_no }}</p>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label("created_at", "Order Date" , ['class' => 'col-md-2 control-label'])!!}
			<div class="col-md-10">
				<p class="form-control-static">{{ $order->created_at }}</p>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label("product", "Product", ['class' => 'col-md-2 control-label'])!!}
			<div class="col-md-10">
				@foreach($products as $product)
					@foreach($product->productDetails as $productDetail)
						@if (in_array($productDetail->id, $product_detail_ids))
							<p class="form-control-static">
								{!! $product->name . " (" . $productDetail->size . " | " . $productDetail->color . " | IDR" . number_format($productDetail->price, 0) . ")" !!} 
							</p>
						@endif
					@endforeach
				@endforeach
			</div>
		</div>
		<div class="form-group">
			{!! Form::label("total_price", "Total Price" , ['class' => 'col-md-2 control-label'])!!}
			<div class="col-md-10">
				<p class="form-control-static">IDR <span class='totalPrice'>{{ $order->total_price }}</span></p>
			</div>
		</div>
		<div class="form-group {!! $errors->has('shipping_address') ? 'has-error' : '' !!}">
			{!! Form::label("shipping_address", "Shipping Address", array('class' => 'col-md-2 control-label'))!!}
			<div class="col-md-10">
				<p class="form-control-static">{!! nl2br($order->shipping_address) !!}</p>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-offset-2 col-md-10">
				<a class="btn btn-danger" href="{{ action('OrderController@index') }}">Back</a>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
@stop