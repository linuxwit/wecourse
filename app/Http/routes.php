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
Route::post('wechat/{id}', 'WechatController@index'); //微信接口
Route::get('wechat/{id}', 'WechatController@ping');

Route::get('/', 'WelcomeController@index'); //网站首页
Route::get('home', 'HomeController@index');

Route::get('aboutus', 'PageController@aboutUs'); //关于我们

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['namespace' => 'Course', 'middleware' => 'auth'], function () {
	Route::get('course/{id}/join', 'CourseController@showJoin');
});

Route::group(['namespace' => 'Course'], function () {

	Route::get('course/{id}', 'CourseController@detail');
	Route::get('course', 'CourseController@index');

	Route::post('course/{id}/join', 'CourseController@join'); //报名
});

Route::group(['namespace' => 'Teacher'], function () {
	Route::get('teacher/{id}', 'TeacherController@detail'); //显示讲师详细
	Route::get('teacher', 'TeacherController@index'); //显示所有老师
});

//后台管理
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function () {
	Route::resource('course', 'CourseController');
	Route::resource('teacher', 'TeacherController');

	Route::resource('user', 'UserController');
	Route::resource('media', 'MediaController');
	Route::resource('order', 'OrderController');
	Route::resource('account', 'AccountController');
	Route::resource('message', 'MessageController');

	Route::get('wechatuser', 'WechatuserController@index');
	//帐号设置
	Route::post('account/{id}/menu/{action}', 'AccountController@menu');
	Route::post('account/{id}/welcome/{action}', 'AccountController@welcome');
});

Route::group(array('prefix' => 'api'), function () {

	// since we will be using this just for CRUD, we won't need create and edit
	// Angular will handle both of those forms
	// this ensures that a user can't access api/create or api/edit when there's nothing there
	//Route::resource('comments', 'CommentController', array('only' => array('index', 'store', 'destroy')));

});