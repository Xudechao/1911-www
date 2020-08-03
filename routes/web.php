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
#**************************************************************
Route::get('/user/info','TestController@userInfo');
Route::get('test2','TestController@test2');
#**************************************************************
Route::get('/test/aes1','TestController@aes1');
Route::get('/test/des1','TestController@des1');
Route::get('/test/rsa','TestController@rsa');
#**************************************************************
Route::get('/test/sign1','TestController@sign1');
Route::get('/header1','TestController@header1');
#**************************************************************
Route::get('/test/pay','TestController@testPay');
Route::get('/pay','TestController@pay');
#**************************************************************
Route::get("/user/login","Index\LoginController@login");  //登陆
Route::get("/user/reg","Index\LoginController@reg"); //注册
Route::get('/user/index','Index\IndexController@index');    //首页
Route::get('/user/desc/{goods_id}','Index\IndexController@desc'); //详情页
