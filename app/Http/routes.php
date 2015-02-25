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
Route::post('/wechat/{id}', 'WechatController@index'); //微信接口
Route::get('/wechat/menu/create/{id}', 'WechatController@setmenu');

Route::get('/wechat/{id}', 'WechatController@index');
Route::get('/mobile', 'MobileController@index');

//微课程
Route::get('/wecourse/teacher/{id}', 'Wecourse\TeacherController@detail'); //讲师列表
Route::get('/wecourse/teacher', 'Wecourse\TeacherController@index'); //讲师介绍

Route::get('/wecourse/course', 'Wecourse\CourseController@index'); //所有课程，课程介绍
Route::get('/wecourse/course/plan', 'Wecourse\CourseController@plan'); //课程计划表
Route::get('/wecourse/course/newest', 'Wecourse\CourseController@newest'); //最新课程
Route::get('/wecourse/course/old', 'Wecourse\CourseController@old'); //往期
Route::get('/wecourse/course/{id}', 'Wecourse\CourseController@detail'); //课程详细

Route::get('/wecourse/join/{id}', 'Wecourse\CourseController@join'); //报名
Route::post('/wecourse/join/{id}', 'Wecourse\CourseController@dojoin'); //报名
Route::get('/wecourse', 'WecourseController@index'); //首页
