<?php namespace App\Http\Controllers\Wecourse;

use App\Http\Controllers\Controller;

class CourseController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
	}

	public function index() {
		return view('wecourse.course.index');
	}

	public function newest() {
		return view('wecourse.course.index');
	}

	public function old() {
		return view('wecourse.course.index');
	}

	public function detail() {
		return view('wecourse.course.detail');
	}

	public function plan() {
		return view('wecourse.course.plan');
	}
}