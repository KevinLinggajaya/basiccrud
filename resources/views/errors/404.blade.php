@extends('layout.master')

@section('title')
	{{ env('TITLE') }} - Not Found
@stop

@section('content')
	<h1>Did you missing the page?</h1>
	<h4>Sorry we couldn't find the page you requested.</h4>
@stop