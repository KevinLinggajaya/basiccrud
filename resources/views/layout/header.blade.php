<div class="navbar navbar-default navbar-fixed-top" >
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapsed">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ action('HomeController@index') }}">{{ env('TITLE') }}</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-collapsed">
			<ul class="nav navbar-nav navbar-right">
				@if (Auth::check())
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ action('Auth\AuthController@getLogout') }}">Logout</a></li>
						</ul>
					</li>
				@endif
			</ul>
		</div>
	</div>		
</div>
