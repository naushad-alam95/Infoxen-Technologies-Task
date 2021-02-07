<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1;



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



Route::group([
    'prefix' => 'auth'
], function () {
	Route::post('login', 'App\Http\Controllers\API\v1\UserController@login');
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
    	Route::post('/list', 'App\Http\Controllers\API\v1\UserController@index');
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/index', 'App\Http\Controllers\API\v1\ProductController@index');

