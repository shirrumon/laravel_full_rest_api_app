<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return response()->json('test');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/public', function () {
    return view('public');
});

Route::get('/api', function () {
    return view('api');
});

