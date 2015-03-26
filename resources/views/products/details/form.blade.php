<?php 
if($productDetail == "[]") {
	$formUrl = action('ProductDetailController@store', $product->id);
	$method = "post";
} else {
	$formUrl = action('ProductDetailController@update', [$product->id, $productDetail->id]);
	$method = "put";
}
?>
<div class="well">
	{!! Form::open(array('url' => $formUrl, 'class' => 'form form-horizontal')) !!}
	{!! Form::hidden('_method',$method) !!}
	<div class="form-group">
		{!! Form::label("is_enabled", "Is Enabled", ['class' => 'col-md-2 control-label'])!!}
		<div class="col-md-10">
			<div class="checkbox">
				<label>
					{!! Form::checkbox('is_enabled', 'true', $productDetail->is_enabled, ['autofocus' => 'autofocus']) !!}
				</label>
			</div>
		</div>
	</div>
	<div class="form-group {!! $errors->has('size') ? 'has-error' : '' !!}">
		{!! Form::label("size", "Size", ['class' => 'col-md-2 control-label'])!!}
		<div class="col-md-10">
			{!! Form::text('size', $productDetail->size, ['class' => 'form-control', 'placeholder' => 'Size']) !!}
			@if ($errors->has('size'))
				{!! $errors->first('size', '<small class=error>:message</small>') !!}
			@endif
		</div>
	</div>
	<div class="form-group">
		{!! Form::label("color", "Color", array('class' => 'col-md-2 control-label'))!!}
		<div class="col-md-10">
			{!! Form::text('color', $productDetail->color, ['class' => 'form-control', 'placeholder' => 'Color']) !!}
			@if ($errors->has('color'))
				{!! $errors->first('color', '<small class=error>:message</small>') !!}
			@endif
		</div>
	</div>
	<div class="form-group">
		{!! Form::label("quantity", "Stock Quantity", array('class' => 'col-md-2 control-label'))!!}
		<div class="col-md-2">
			{!! Form::text('quantity', $productDetail->quantity, ['class' => 'form-control', 'placeholder' => 'Quantity']) !!}
			@if ($errors->has('quantity'))
				{!! $errors->first('quantity', '<small class=error>:message</small>') !!}
			@endif
		</div>
	</div>
	<div class="form-group">
		{!! Form::label("weight", "Weight (Gram)", array('class' => 'col-md-2 control-label'))!!}
		<div class="col-md-2">
			{!! Form::text('weight', $productDetail->weight, ['class' => 'form-control', 'placeholder' => 'Weight']) !!}
			@if ($errors->has('weight'))
				{!! $errors->first('weight', '<small class=error>:message</small>') !!}
			@endif
		</div>
	</div>
	<div class="form-group">
		{!! Form::label("price", "Price (IDR)", array('class' => 'col-md-2 control-label'))!!}
		<div class="col-md-2">
			{!! Form::text('price', $productDetail->price, ['class' => 'form-control', 'placeholder' => 'Price']) !!}
			@if ($errors->has('price'))
				{!! $errors->first('price', '<small class=error>:message</small>') !!}
			@endif
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-offset-2 col-md-10">
			{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
			<a class="btn btn-danger" href="{{ action('ProductDetailController@index', $product->id) }}">Cancel</a>
		</div>
	</div>
	{!! Form::close() !!}
</div>