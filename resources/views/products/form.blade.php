<?php 
if($product == "[]") {
	$formUrl = action('ProductController@store');
	$method = "post";
} else {
	$formUrl = action('ProductController@update', $product->id);
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
					{!! Form::checkbox('is_enabled', 'true', $product->is_enabled, ['autofocus' => 'autofocus']) !!}
				</label>
			</div>
		</div>
	</div>
	<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
		{!! Form::label("name", "Name", ['class' => 'col-md-2 control-label'])!!}
		<div class="col-md-10">
			{!! Form::text('name', $product->name, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
			@if ($errors->has('name'))
				{!! $errors->first('name', '<small class=error>:message</small>') !!}
			@endif
		</div>
	</div>
	<div class="form-group {!! $errors->has('code') ? 'has-error' : '' !!}">
		{!! Form::label("code", "Code", array('class' => 'col-md-2 control-label'))!!}
		<div class="col-md-10">
			{!! Form::text('code', $product->code, ['class' => 'form-control', 'placeholder' => 'Code']) !!}
			@if ($errors->has('code'))
				{!! $errors->first('code', '<small class=error>:message</small>') !!}
			@endif
		</div>
	</div>
	<div class="form-group">
		{!! Form::label("description", "Description", array('class' => 'col-md-2 control-label'))!!}
		<div class="col-md-10">
			{!! Form::textarea('description', $product->description, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-offset-2 col-md-10">
			{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
			<a class="btn btn-danger" href="{{ action('ProductController@index') }}">Cancel</a>
		</div>
	</div>
	{!! Form::close() !!}
</div>