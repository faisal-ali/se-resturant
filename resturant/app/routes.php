<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::route('order.index');
});

Route::get('menu/fetchprice', array('as' => 'menu.fetchPriceAjax', 'uses' => 'MenuController@fetchPriceAjax'));
Route::resource('menu', 'MenuController');

Route::get('order/view', array('as' => 'orderr.view', 'uses' => 'OrderrController@view'));
Route::get('order/process/{id}', array('as' => 'orderr.process', 'uses' => 'OrderrController@process'));
Route::resource('order', 'OrderrController');
Route::post('order/search', array('as' => 'orderr.search', 'uses' => 'OrderrController@search'));

Route::resource('customer', 'CustomerController');

Route::resource('daily_intake', 'DailyIntakeController');
