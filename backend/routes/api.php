<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/addItem', [
	'uses'=>'ItemsController@postItem'
]);

Route::get('/getItems', [
	'uses'=>'ItemsController@getItems'
]);

Route::get('/getItem/{id}', [
	'uses'=>'ItemsController@getItem'
]);

Route::delete('/deleteItem/{id}', [
	'uses'=>'ItemsController@deleteItems'
]);

Route::put('/editItem/{id}', [
	'uses'=>'ItemsController@editItems'
]);