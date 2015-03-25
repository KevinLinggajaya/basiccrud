<ul class="nav nav-stacked" role="navigation">
	<li role="presentation" class="{{ strpos(Request::path(),'products') !== false ? 'active' : '' }}"><a href="{{action('ProductController@index')}}"> <span class="glyphicon glyphicon-dashboard"></span> Product</a></li>
</ul>