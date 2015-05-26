<?php namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Order;
use App\Profile;
use App\User;
use Auth;
use Input;

class CourseController extends Controller {

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
		$user = User::findOrFail(Auth::user()->id);
		$profile = Profile::where('uid', '=', $user->id)->first();

		$model = new Order;
		$builder = $model->orderBy('id', 'desc');
		$builder->where('uid', '=', $user->id);
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
		$models = $builder->paginate(10);

		return view('user.course', ['user' => $user, 'profile' => $profile, 'docs' => $models]);
	}

}