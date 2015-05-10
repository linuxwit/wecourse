<?php namespace App\Http\Controllers\Course;
use App\Course;
use App\Http\Controllers\Controller;
use App\Order;
use Auth;
use Illuminate\Http\Request;
use Input;
use Redirect;

class CourseController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->autoLoginInWechat();
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
		if ($course) {
			return view('course.detail', ['doc' => $course, 'teacher' => $course->teacher]);
		} else {
			return Redirect::to('course');
		}

	}
	public function showJoin($id) {
		$course = Course::find($id);
		if ($course) {
			return view('course.join', ['doc' => $course]);
		} else {
			return Redirect::to('course');
		}
	}

	public function join(Request $request, $id) {
		$rules = [
			'name' => 'required|max:100',
			'mobile' => 'required|max:120',
			'company' => 'required|max:120',
			'title' => 'required|max:120',
			'source' => 'max:120',
			'spm' => 'max:120',
		];
		$validator = $this->validate($request, $rules);
		$course = Course::find($id);
		if (!$course) {
			return Redirect::to('course/');
		}
		$inputs = Input::only('name', 'mobile', 'company', 'title', 'spm', 'source', 'country', 'provice', 'city');
		$order = Order::create(array_merge($inputs,
			array(
				'uid' => Auth::id(),
				'itemid' => $course->id,
				'itemtitle' => $course->title,
				'price' => $course->currentprice,
				'status' => 0,
				'paystatus' => 0,
				'paytype' => 1,
			))
		);

		if ($order) {
			return Redirect::back()->withSuccess('报名成功！很快我们的客服人员将会与您联系');
		} else {
			return Redirect::back()->withInput()->withErrors('提交报名申请失败失败！请重试');
		}
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
}