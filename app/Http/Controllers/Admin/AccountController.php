<?php namespace App\Http\Controllers\Admin;
use App\Account;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Input;
use Log;
use Redirect;

class AccountController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		return view('admin.wechat.account')->withAccounts(Account::all());
	}
	public function setting($id) {
		return view('admin.wechat.setting')->withAccount(Account::find($id));
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
	 *	$table->integer('uid');
	 * @return Response
	 */
	public function store(Request $request) {
		Log::debug('create account');
		$rules = array(
			'name' => 'required',
			'type' => 'required',
			'audit' => 'required|integer',
			'appid' => 'required|max:18',
			'appsecret' => 'required|max:32',
		);
		$validator = $this->validate($request, $rules);
		if ($validator && $validator->fails()) {
			return response()->json(array('s' => 0, 'm' => $validator->messages()));
		} else {
			$input = Input::only('name', 'type', 'audit', 'appid', 'appsecret');
			$token = md5($input['name'] . $input['type'] . $input['audit'] . $input['appid']);
			$encodingaeskey = md5($token . $input['appsecret']);
			$model = Account::create(
				array_merge($input,
					array(
						'uid' => Auth::id(),
						'maxlbslength' => 1000,
						'times' => 0,
						'subscribeenable' => 0,
						'nomatchenable' => 0,
						'token' => $token,
						'encodingaeskey' => $encodingaeskey,
					)
				)
			);
			if ($model) {
				return response()->json(array('s' => 1, 'm' => '添加成功'));
			} else {
				return response()->json(array('s' => 0, 'm' => '添加失败，请重试'));
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
		return view('admin.wechat.setting')->withAccount(Account::find($id));
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id) {
		$modal = Account::find($id);
		if ($modal && $modal->uid == Auth::id()) {

		}
		$rules = array(
			'name' => 'required|unique:mp_account,name',
			'type' => 'required',
			'audit' => 'required|integer',
			'appid' => 'required|max:18',
			'appsecret' => 'required|max:32',
			'token' => 'required',
			'encodingaeskey' => 'required',
		);
		$validator = $this->validate($request, $rules);
		$modal->name = Input::get('name');
		$modal->type = Input::get('type');
		$modal->audit = Input::get('audit');
		$modal->appid = Input::get('appid');
		$modal->appsecret = Input::get('appsecret');
		$modal->token = Input::get('token');
		$modal->encodingaeskey = Input::get('encodingaeskey');

		if ($modal->save()) {
			return Redirect::to('admin/account/' . $modal->id . '/edit');
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
		//
	}
}