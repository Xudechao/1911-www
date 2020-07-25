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

Route::get('/redis/hash1','TestController@hash1');

Route::get('/user/info','TestController@userInfo');
Route::get('test2','TestController@test2');


Route::get('/test/aes1','TestController@aes1');
Route::get('/test/des1','TestController@des1');
Route::get('/test/rsa','TestController@rsa');
