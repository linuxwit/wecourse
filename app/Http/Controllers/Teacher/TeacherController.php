<?php namespace App\Http\Controllers\Teacher;
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
		return view('teacher.index');
	}

	/**
	 *
	 *
	 * @return Response
	 */
	public function detail() {
		return view('teacher.detail');
	}
}