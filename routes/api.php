<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'admin','as'=>'admin.'], function() {
    Route::get('orders', ['as' => 'orders', 'uses' => 'App\Http\Controllers\OrderController@index']);
    Route::get('orders/{id}', ['as' => 'orders/{id}', 'uses' => 'App\Http\Controllers\OrderController@show']);
    Route::post('orders', ['as' => 'store', 'uses' => 'App\Http\Controllers\OrderController@store']);
    Route::put('orders/{id}', ['as' => 'orders/{id}', 'uses' => 'App\Http\Controllers\OrderController@update']);
    Route::delete('orders/{id}', ['as' => 'orders/{id}', 'uses' => 'App\Http\Controllers\OrderController@delete']);
    Route::get('download', ['as' => 'orders/download', 'uses' => 'App\Http\Controllers\OrderController@downloadAll']);
    Route::get('download/{id}', ['as' => 'orders/download', 'uses' => 'App\Http\Controllers\OrderController@download']);
});

Route::group(['prefix'=>'public','as'=>'public.'], function() {
    Route::get('orders', ['as' => 'orders', 'uses' => 'App\Http\Controllers\OrderController@index']);
    Route::get('orders/{id}', ['as' => 'orders/{id}', 'uses' => 'App\Http\Controllers\OrderController@show']);
    Route::get('download', ['as' => 'orders/download', 'uses' => 'App\Http\Controllers\OrderController@downloadAll']);
    Route::get('download/{id}', ['as' => 'orders/download', 'uses' => 'App\Http\Controllers\OrderController@download']);
});
