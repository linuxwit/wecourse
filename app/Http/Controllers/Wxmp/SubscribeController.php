<?php namespace App\Http\Controllers\Wxmp;
use App\Http\Controllers\Controller;

class SubscribeController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * 显示用户设置信息
	 *
	 * @return Response
	 */
	public function show() {
		return view('user.profile');
	}

}