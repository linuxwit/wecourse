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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('user/profile', ['middleware' => 'auth', 'uses' => 'ProfileController@show']);
Route::get('wxmp/subscribe', ['middleware' => 'auth', 'uses' => 'Wxmp\SubscribeController@show']);

Route::get('wxmp/account/setting', ['middleware' => 'auth', 'uses' => 'Wxmp\AccountController@setting']);
Route::get('wxmp/account', ['middleware' => 'auth', 'uses' => 'Wxmp\AccountController@show']);
Route::get('wxmp/reply', ['middleware' => 'auth', 'uses' => 'Wxmp\ReplyController@show']);
Route::post('/wechat', 'WechatController@index'); //微信接口
Route::get('/wechat/menu/create', 'WechatController@setmenu');

Route::get('/mobile', 'MobileController@index');