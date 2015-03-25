<!DOCTYPE html>
<html>
<head>
	<title>
		@section('title')
		This is Title
		@show
	</title>
	{!! HTML::style('css/app.css') !!}
	{!! HTML::script('js/app.js') !!}
</head>
<body>
	@include('layout.header')
	<div id="tpl-content" class="container-fluid">
		<div class="row clearfix">
			<div class="col-md-2 sidebar">
				@include('layout.menu')
			</div>
			<div class="col-md-10 col-xs-12 pull-right">
				@yield('content')
			</div>
		</div>
	</div>
	@include('layout.footer')
</body>
</html>