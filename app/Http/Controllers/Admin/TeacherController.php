<?php namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Teacher;
use Auth;
use Illuminate\Http\Request;
use Input;
use Redirect;

class TeacherController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$model = new Teacher;
		$builder = $model->orderBy('id', 'desc');

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
		$models = $builder->paginate(20);

		return view('admin.teacher.index', [
			'docs' => $models,
		]);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return view('admin.teacher.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request) {
		$rules = [
			'title' => 'required|max:100',
			'avatar' => 'required|max:120',
			'summary' => 'required|max:500',
			'content' => 'required',
		];
		$validator = $this->validate($request, $rules);
		$inputs = Input::only('title', 'avatar', 'content', 'summary', 'phone', 'mobile', 'address');
		$model = Teacher::create(array_merge($inputs, array('uid' => Auth::id())));
		if ($model) {
			return Redirect::to('admin/teacher');
		} else {
			return Redirect::back()->withInput()->withErrors('保存失败！');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}
