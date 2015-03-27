<ul class="nav nav-stacked" role="navigation">
	<li role="presentation" class="{{ strpos(Request::path(),'products') !== false ? 'active' : '' }}"><a href="{{action('ProductController@index')}}"> <span class="glyphicon glyphicon-list"></span> Product</a></li>
	<li role="presentation" class="{{ strpos(Request::path(),'orders') !== false ? 'active' : '' }}"><a href="{{action('OrderController@index')}}"> <span class="glyphicon glyphicon-tag"></span> Order</a></li>
	<li role="presentation" class="{{ strpos(Request::path(),'reports') !== false ? 'active' : '' }}"><a href="{{action('ReportController@index')}}"> <span class="glyphicon glyphicon-paste"></span> Report</a></li>
</ul>
