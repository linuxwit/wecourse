<?php namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Teacher;
use Auth;
use Config;
use Illuminate\Http\Request;
use Input;
use Redirect;

class TeacherController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}
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
			'avatar' => 'required',
			'summary' => 'required|max:500',
			'content' => 'required',
		];
		$validator = $this->validate($request, $rules);
		$inputs = Input::only('name', 'title', 'content', 'summary', 'phone', 'mobile', 'address');

		if (Input::hasFile('avatar')) {
			$file = Input::file('avatar');
			$media = $this->upload($file, Auth::id(), '/upload/image/teacher/');
			$model->avatar = $media->cloudurl;
			$model = Teacher::create(array_merge($inputs, array('uid' => Auth::id(), 'avatar' => $media->cloudurl)));
			if ($model) {
				return Redirect::to('admin/teacher');
			} else {
				return Redirect::back()->withInput()->withErrors('保存失败！');
			}
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
		return view('admin.teacher.edit', [
			'doc' => Teacher::find($id),
			'qiniu' => Config::get('app.qiniu')['domain'],
		]);
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id) {
		$rules = [
			'title' => 'required|max:100',
			'summary' => 'required|max:500',
			'content' => 'required',
		];
		$validator = $this->validate($request, $rules);
		$model = Teacher::find($id);
		if (!$model) {
			return Redirect::to('/');
		}
		if (Input::hasFile('avatar')) {
			$file = Input::file('avatar');
			$media = $this->upload($file, Auth::id());
			$model->avatar = $media->cloudurl;
		}
		$model->name = Input::get('name');
		$model->title = Input::get('title');
		$model->content = Input::get('content');
		$model->summary = Input::get('summary');
		$model->phone = Input::get('phone');
		$model->mobile = Input::get('mobile');
		$model->address = Input::get('address');
		if ($model->save()) {
			return Redirect::to('admin/teacher');
		} else {
			return Redirect::back()->withInput()->withErrors('保存失败！');
		}
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		$model = Teacher::find($id);
		$model->delete();
		return Redirect::to('admin/teacher');
	}
}