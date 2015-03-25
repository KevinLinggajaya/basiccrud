@extends('layout.blank')

@section('title')
	{{ env('TITLE') }} - Login
@stop

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default login">
				<div class="panel-heading"><h2>Login</h2></div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					{!! Form::open(array('url' => action('Auth\AuthController@postLogin'), 'class' => 'form form-horizontal', 'role' => 'form', 'method' => 'POST')) !!}
						<div class="form-group">
							{!! Form::label("email", "E-Mail Address", ['class' => 'col-md-4 control-label'])!!}
							<div class="col-md-6">
								{!! Form::text('email', old('email'), ['class' => 'form-control', 'autofocus' => 'autofocus']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label("password", "Password", ['class' => 'col-md-4 control-label'])!!}
							<div class="col-md-6">
								{!! Form::text('password', old('password'), ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										{!! Form::checkbox('remember', 'false') !!} Remember Me
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection
