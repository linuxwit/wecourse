<?php namespace App\Http\Controllers\Course;
use App\Course;
use App\Http\Controllers\Controller;
use Input;

class CourseController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
	}
	public function index() {
		$model = new Course;
		$builder = $model->orderBy('id', 'desc');
		$builder->where('online', '=', 1);
		$input = Input::all();
		foreach ($input as $field => $value) {
			if (empty($value)) {
				continue;
			}
			if (!isset($this->fields_all[$field])) {
				continue;
			}
			$search = $this->fields_all[$field];
			$builder->whereRaw($search['search'], [$value]);
		}
		$models = $builder->paginate(8);
		return view('course.index', [
			'docs' => $models,
		]);
	}
	public function detail($id) {
		$course = Course::find($id);
		return view('course.detail', ['doc' => $course, 'teacher' => $course->teacher]);
	}

	public function newest() {
		return view('course.index');
	}
	public function old() {
		return view('course.index');
	}
	public function plan() {
		return view('course.plan');
	}
	public function join() {
		return view('course.join');
	}
}