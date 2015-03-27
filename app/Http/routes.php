<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'auth/login', 'uses' => 'Auth\AuthController@getLogin']);

Route::controllers([
	'auth' => 'Auth\AuthController'
]);

Route::group(['prefix' => 'admin'], function(){ 
	Route::get('/', 'HomeController@index');

	Route::resource('products', 'ProductController', ['except' => 'show']);

	Route::resource('products/{productId}/details', 'ProductDetailController', ['except' => 'show']);

	Route::resource('orders', 'OrderController');

	Route::resource('reports', 'ReportController', ['only' => ['index', 'show']]);
});