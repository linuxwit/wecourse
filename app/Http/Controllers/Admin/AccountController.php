<?php namespace App\Http\Controllers\Admin;
use App\Account;
use App\Http\Controllers\Controller;
use App\Reply;
use App\Witleaf\Wechat\Wechat;
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
		return Account::find($id);
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$funs = array(
			'讲师介绍' => array(
				'type' => 'click',
				'key' => 'TEACHER_INFO',
			), '最近课程' => array(
				'type' => 'click',
				'key' => 'COURSE_LAST',
			),
			'课程排表' => array(
				'type' => 'click',
				'key' => 'COURSE_PLAN',
			),
			'申请合作' => array(
				'type' => 'click',
				'key' => '申请合作',
			),
			'在线互动' => array(
				'type' => 'view',
				'url' => 'http://www.mf23.cn',
			),
		);

		return view('admin.wechat.setting')->with(array('account' => Account::find($id), 'modules' => $funs));
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
			'name' => 'required',
			'type' => 'required',
			'audit' => 'required|integer',
			'appid' => 'required|max:18',
			'appsecret' => 'required|max:32',
			'token' => 'required',
			//'encodingaeskey' => 'required',
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

	public function welcome(Request $request, $id, $action) {
		$model = Account::find($id);
		if ($model && $model->uid == Auth::id()) {
			$model->subscribeenable = Input::get('enable') ? 1 : 0;
			$model->subscribemsgtype = Input::get('type');
			$model->subscribecontent = Input::get('content');
			if ($model->save()) {
				return array('msg' => '操作成功', 'status' => 'success');
			} else {
				return array('msg' => '操作失败', 'status' => 'error');
			}
		}
	}
	/**
	 * 对微信菜单进行操作
	 * {"button":[{"name":"培训课程",
	 * "sub_button":[{"type":"click","key":"讲师介绍",
	 * "name":"讲师介绍"},{"type":"click","key":"课程介绍","name":"课程介绍"}]},
	 * {"name":"我的课程","type":"click","key":"讲师介绍"}]}
	 */
	public function menu(Request $request, $id, $action) {
		$model = Account::find($id);
		if ($model && $model->uid == Auth::id()) {
			$menu = Input::get('button');
			$old_menu = $model->menu;

			$model->menu = json_encode($menu);
			if ($model->save()) {
				//将点击事件要回复的内容保存或更新到自动回复表中
				$click_buttons = array();
				foreach ($menu['button'] as $button) {
					if (isset($button['sub_button'])) {
						foreach ($button['sub_button'] as $sub_button) {
							if (isset($sub_button['module'])) {
								$module = json_decode($sub_button['module'], true);

								$sub_button['type'] = $module['type'];
								$sub_button['key'] = $module['key'];
							}
							$click_buttons[$sub_button['name']] = $sub_button;
						}
					} else {
						if (isset($button['module'])) {
							$module = json_decode($button['module'], true);
							$button['type'] = $module['type'];
							if (isset($module['key'])) {
								$button['key'] = $module['key'];
							}

						}
						$click_buttons[$button['name']] = $button;
					}
				}

				var_dump($click_buttons);

				//删除原有生成的合成
				Reply::whereRaw('uid=? and accountid=? and matchtype=?', array(Auth::id(), $id, Wechat::EVENT_MENU_CLICK))->delete();

				foreach ($click_buttons as $key => $button) {
					$content = '';
					if ($button['fun'] == 'link') {
						$content = $button['url'];
					} else {
						$content = isset($button[$button['fun']]) ? $button[$button['fun']] : '';
					}
					Reply::create(array(
						'uid' => Auth::id(),
						'accountid' => $id,
						'matchtype' => Wechat::EVENT_MENU_CLICK,
						'matchvalue' => $button['key'],
						'msgtype' => $button['fun'],
						'content' => $content,
					));
				}

				$return = true;
				switch ($action) {
					case 'publish':
						$return = $this->setmenu($model, $menu);
						if ($return) {
							//设置成功时，将原有菜单备份
							$model->backupmenu = $old_menu;
							$model->save();
						}
						break;
					default:

						break;
				}
				if ($return) {
					return array('msg' => '操作成功', 'status' => 'success');
				} else {
					return array('msg' => '操作失败，请重试！', 'status' => 'error');
				}

			} else {
				return array('msg' => '操作失败，请重试！', 'status' => 'error');

			}
		}
	}

	protected function setmenu($account, $menu) {
		$options = array(
			'token' => $account->token, //填写你设定的key
			//'encodingaeskey' => '', //填写加密用的EncodingAESKey
			'appid' => $account->appid, //填写高级调用功能的app id
			'appsecret' => $account->appsecret, //填写高级调用功能的密钥
			'debug' => true,
		);
		$weObj = new Wechat($options);
		$result = $weObj->createMenu($menu);
		if ($result === false) {
			Log::error('设置菜单错误' . $weObj->errCode . $weObj->errMsg);

		}
		return $result;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		$account = Account::find($id);
		if ($account) {
			$account->delete();
		}
		return Redirect::to('admin/account');
	}
}