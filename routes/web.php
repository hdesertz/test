<?php

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
    return view('welcome');
});
Route::get('/test1', 'Auth\TestController@test1');
Route::get('/ab', 'Auth\TestController@abTest');
Route::get('/ab1', 'Auth\TestController@abTest1');
Route::get('/ab2', 'Auth\TestController@abTest2');
Route::get('/ab3', 'Auth\TestController@abTest3');
Route::get('/jsonp', 'Auth\TestController@jsonpTest3');
