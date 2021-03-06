<?php namespace App\Http\Controllers;

class MobileController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Mobile Controller 微官网
	|--------------------------------------------------------------------------
	| 这里处理所有手机上的页面
	|
	 */

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest');
	}

	/**
	 * 显示移动端的首页
	 *
	 * @return Response
	 */
	public function index() {
		return view('mobile.welcome');
	}

}