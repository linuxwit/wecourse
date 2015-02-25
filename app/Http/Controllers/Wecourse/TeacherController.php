<?php namespace App\Http\Controllers\Wecourse;
use App\Http\Controllers\Controller;

class TeacherController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {

	}

	/**
	 * 显示
	 *
	 * @return Response
	 */
	public function index() {
		return view('wecourse.teacher.index');
	}

	/**
	 *
	 *
	 * @return Response
	 */
	public function detail() {
		return view('wecourse.teacher.detail');
	}
}