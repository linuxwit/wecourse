<?php namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Teacher;
use Input;

//use Illuminate\Http\Request;
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
		$model = new Teacher;
		$builder = $model->orderBy('id', 'desc');
		//$builder->where('online', '=', 1);
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
		return view('teacher.index')->withDocs($model);
	}

	/**
	 *
	 *
	 * @return Response
	 */
	public function detail($id) {
		return view('teacher.detail')->withDoc(Teacher::find($id));
	}
}