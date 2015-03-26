<?php 
if($stock == "[]") {
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
		{!! Form::label("is_owned", "Is Owned", ['class' => 'col-md-2 control-label'])!!}
		<div class="col-md-10">
			<div class="checkbox">
				<label>
					{!! Form::checkbox('is_owned', 'true', $stock->is_owned) !!}
				</label>
			</div>
		</div>
	</div>
	<div class="form-group">
		{!! Form::label("is_watched", "Is Watched", ['class' => 'col-md-2 control-label'])!!}
		<div class="col-md-10">
			<div class="checkbox">
				<label>
					{!! Form::checkbox('is_watched', 'true', $stock->is_watched) !!}
				</label>
			</div>
		</div>
	</div>
	<div class="form-group">
		{!! Form::label("is_lq45", "Is LQ45", ['class' => 'col-md-2 control-label'])!!}
		<div class="col-md-10">
			<div class="checkbox">
				<label>
					{!! Form::checkbox('is_lq45', 'true', $stock->is_lq45) !!}
				</label>
			</div>
		</div>
	</div>
	<div class="form-group {!! $errors->has('code') ? 'has-error' : '' !!}">
		{!! Form::label("code", "Code", array('class' => 'col-md-2 control-label'))!!}
		<div class="col-md-10">
			{!! Form::text('code', $stock->code, ['class' => 'form-control', 'placeholder' => 'Code', 'autofocus' => 'autofocus']) !!}
			@if ($errors->has('code'))
			{!! $errors->first('code', '<small class=error>:message</small>') !!}
			@endif
		</div>
	</div>
	<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
		{!! Form::label("name", "Name", ['class' => 'col-md-2 control-label'])!!}
		<div class="col-md-10">
			{!! Form::text('name', $stock->name, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
			@if ($errors->has('name'))
			{!! $errors->first('name', '<small class=error>:message</small>') !!}
			@endif
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-offset-2 col-md-10">
			{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
			<a class="btn btn-danger" href="{{ URL::to('stocks') }}">Cancel</a>
		</div>
	</div>
	{!! Form::close() !!}
</div>