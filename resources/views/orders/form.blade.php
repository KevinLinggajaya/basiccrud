<div class="well">
	{!! Form::open(array('url' => $formUrl, 'class' => 'form form-horizontal')) !!}
	{!! Form::hidden('_method',$method) !!}
	{!! Form::hidden('order_no',$order->order_no) !!}
	{!! Form::hidden('total_price', $order->total_price, ['id' => 'inputTotalPrice']) !!}
	<div class="form-group">
		{!! Form::label("order_no", "Order No" , ['class' => 'col-md-2 control-label'])!!}
		<div class="col-md-10">
			<p class="form-control-static">{{ $order->order_no }}</p>
		</div>
	</div>
	@if($order->created_at)
	<div class="form-group">
		{!! Form::label("created_at", "Order Date" , ['class' => 'col-md-2 control-label'])!!}
		<div class="col-md-10">
			<p class="form-control-static">{{ $order->created_at }}</p>
		</div>
	</div>
	@endif
	<div class="form-group">
		{!! Form::label("product", "Product", ['class' => 'col-md-2 control-label'])!!}
		<div class="col-md-10">
			@foreach($products as $product)
				@foreach($product->productDetails as $productDetail)
				<div class="checkbox">
					<label>
						<input class="product" type="checkbox" name="product_detail_ids[]" value="{{$productDetail->id}}" {{ in_array($productDetail->id, $product_detail_ids) ? 'checked' : '' }} price="{{intval($productDetail->price)}}" {{ $productDetail->quantity > 0 ? '' : ($method == 'put' ? '' : 'disabled') }}>
						{!! $product->name . " (" . $productDetail->size . " | " . $productDetail->color . " | IDR" . number_format($productDetail->price, 0) . ")" !!} 
						@if ($productDetail->quantity == 1 || ($productDetail->quantity == 0 && $method == 'put'))
							<span class="text-danger">Last Stock!</span>
						@elseif ($productDetail->quantity == 0)
							<span class="text-danger">Out of Stock</span>
						@endif
					</label>
				</div>
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
			{!! Form::textarea('shipping_address', $order->shipping_address, ['class' => 'form-control', 'placeholder' => 'Shipping Address']) !!}
			@if ($errors->has('shipping_address'))
				{!! $errors->first('shipping_address', '<small class=error>:message</small>') !!}
			@endif
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-offset-2 col-md-10">
			{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
			<a class="btn btn-danger" href="{{ action('OrderController@index') }}">Cancel</a>
		</div>
	</div>
	{!! Form::close() !!}
</div>

<script type="text/javascript">
var price = 0;
$(".product").click(function(){
	productPriceCalculate($(this));
});

$(".product:checked").each(function(){
	productPriceCalculate($(this));
});

function productPriceCalculate(obj) {
	if(obj.is(":checked")){
		price = price + parseInt(obj.attr('price'));
	} else {
		price = price - parseInt(obj.attr('price'));
	}
	$(".totalPrice").html(price);
	$("#inputTotalPrice").val(price);
}

</script>