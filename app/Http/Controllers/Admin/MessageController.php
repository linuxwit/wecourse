<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Support\Facades\Input;

class MessageController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {

		$model = new Message;
		$builder = $model->wechatuser()->orderBy('id', 'desc');
		//$builder->where('type', '=', 0);
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
		return view('admin.wechat.message', [
			'docs' => $models,
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {

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
