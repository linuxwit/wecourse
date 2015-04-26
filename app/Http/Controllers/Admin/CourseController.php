<?php namespace App\Http\Controllers\Admin;
use App\Course;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Input;
use Log;
use Redirect;

class CourseController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$model = new Course;
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
		return view('admin.course.index', [
			'docs' => $models,
		]);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return view('admin.course.create');
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request) {
		$rules = [
			'title' => 'required|max:100',
			'subtitle' => 'required|max:120',
			'begintime' => 'required|date',
			'endtime' => 'required|date',
			'city' => 'required|max:50',
			'address' => 'required|max:200',
			'summary' => 'required',
			'cover' => 'required',
			'online' => 'required',
			'content' => 'required',
		];
		$validator = $this->validate($request, $rules);

		$inputs = Input::only('title', 'content', 'subtitle', 'begintime', 'endtime', 'address', 'city', 'cover', 'online', 'content', 'currentprice', 'oldprice', 'teacherid');
		if (Input::hasFile('cover')) {
			$file = Input::file('cover');
			$media = $this->upload($file, Auth::id(), '/upload/image/course/');
			$model = Course::create(array_merge($inputs, array('uid' => Auth::id(), 'cover' => $media->cloudurl, 'teacherid' => 1)));
			if ($model) {
				return Redirect::to('admin/course');
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
		return Redirect::to('course/'+$id);
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		return view('admin.course.edit')->withDoc(Course::find($id));
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
			'subtitle' => 'required|max:120',
			'begintime' => 'required|date',
			'endtime' => 'required|date',
			'city' => 'required|max:50',
			'address' => 'required|max:200',
			'summary' => 'required',
			'online' => 'required',
			'content' => 'required',
		];
		$validator = $this->validate($request, $rules);
		$course = Course::find($id);
		$course->title = Input::get('title');
		$course->summary = Input::get('summary');
		$course->content = Input::get('content');
		$course->subtitle = Input::get('subtitle');
		$course->begintime = Input::get('begintime');
		$course->endtime = Input::get('endtime');
		$course->city = Input::get('city');
		$course->address = Input::get('address');
		$course->online = Input::get('online');
		$course->currentprice = Input::get('currentprice');
		$course->oldprice = Input::get('oldprice');
		if (Input::hasFile('cover')) {
			Log::debug('have cover');
			$file = Input::file('cover');
			$media = $this->upload($file, Auth::id(), '/upload/image/course/');
			if ($media && $media->cloudurl) {

				$model->cover = $media->cloudurl;
			}
		}
		Log::debug('cover:' . $model->cover);
		$rules = [
			'title' => 'required|max:100',
			'subtitle' => 'required|max:120',
			'begintime' => 'required|date',
			'endtime' => 'required|date',
			'city' => 'required|max:50',
			'address' => 'required|max:200',
			'summary' => 'required',
			'cover' => 'required',
			'online' => 'required',
			'content' => 'required',
		];
		$validator = $this->validate($request, $rules);

		var_dump($validator);

		if ($course->save()) {
			return Redirect::to('admin/course');
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
		$course = Course::find($id);
		$course->delete();
		return Redirect::to('admin/course');
	}
}