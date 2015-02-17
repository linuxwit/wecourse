<?php namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Log;
use \App\Account;
use \App\Message;
use \App\Reply;
use \App\Witleaf\Wechat\Wechat;

Class WechatController extends BaseController {

	public function index($id) {
		$account = Account::where('uid', '=', $id)->first();
		if (!$account) {
			Log::error('Unkown Id:' . $id);
			return;
		}
		$options = array(
			'token' => $account->token, //填写你设定的key
			'encodingaeskey' => '', //填写加密用的EncodingAESKey
			'appid' => $account->appid, //填写高级调用功能的app id
			'appsecret' => $account->appsecret, //填写高级调用功能的密钥
		);
		$weObj = new Wechat($options);
		//$weObj->valid();
		Log::debug('pass valid');

		$rev = $weObj->getRev();
		$type = $rev->getRevType();

		Log::debug('记录用户操作信息');
		//记录用户操作信息
		Message::create([
			'accountid' => $account->id,
			'tousername' => $rev->getRevTo(),
			'fromusername' => $rev->getRevFrom(),
			'msgtype' => $type,
			'createtime' => $rev->getRevCtime(),
			'content' => json_encode($rev->getRevData()),
		]);

		Log::debug('响应用请求');
		switch ($type) {
			case Wechat::MSGTYPE_TEXT:
				$weObj->text("hello, I'm wechat")->reply();
				break;
			case Wechat::MSGTYPE_EVENT:
				$key = $rev->getRevEvent()['key'];
				$event = $rev->getRevEvent()['event'];
				$this->doEvent($weObj, $key, $event, $account, $id);
				break;
			case Wechat::MSGTYPE_IMAGE:
				$weObj->text('图片')->reply();
				break;
			default:
				$weObj->text("非常抱谦，暂时找不到相关服务，有问题请找客服")->reply();
		}
	}

	protected function doEvent($weObj, $key, $event, $account, $uid) {
		switch ($event) {
			case Wechat::EVENT_SUBSCRIBE:
				$weObj->text("谢谢关注")->reply();
				break;
			case Wechat::EVENT_MENU_CLICK:
				if ($key) {
					$reply = Reply::whereRaw('uid =? and matchtype = ? and matchvalue = ?', [$uid, $key, $event])->first();
					if ($reply) {
						$type = $reply->msgtype;
						$weObj->$type(json_decode($reply->content))->reply();
					} else {
						$weObj->text("{$key}={$event}")->reply();
					}
				} else {
					$weObj->text('no key')->reply();
				}
				break;
			default:
				$weObj->text('非常抱谦，暂时找不到相关服务，有问题请找客服')->reply();
				break;
		}
	}

	public function setmenu($id) {
		$account = Account::where('uid', '=', $id)->first();
		if (!$account) {
			Log::error('Unkown Id:' . $id);
			return;
		}
		$options = array(
			'token' => $account->token, //填写你设定的key
			'encodingaeskey' => '', //填写加密用的EncodingAESKey
			'appid' => $account->appid, //填写高级调用功能的app id
			'appsecret' => $account->appsecret, //填写高级调用功能的密钥
		);
		$weObj = new Wechat($options);
		$account->backupmenu = json_encode($weObj->getMenu());
		$account->update();
		$newmenu = json_decode($account->menu, true);
		echo $result = $weObj->createMenu($newmenu);
	}
}