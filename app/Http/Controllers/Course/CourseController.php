<?php namespace App\Http\Controllers\Course;
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
		return view('course.index');
	}

	public function newest() {
		return view('course.index');
	}

	public function old() {
		return view('course.index');
	}

	public function detail() {
		return view('course.detail');
	}

	public function plan() {
		return view('course.plan');
	}

	public function join() {
		return view('course.join');
	}
}