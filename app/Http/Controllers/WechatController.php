<?php namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Log;
use \App\Account;
use \App\Witleaf\Wechat\Wechat;

Class WechatController extends BaseController {

	protected $account;
	protected $weObj;
	protected $options;

	protected function init($id) {
		$this->account = Account::where('uid', '=', $id)->first();
		if (!$this->account) {
			Log::error('无法识别请求 Id:' . $id);
			return;
		}
		$this->options = array(
			'token' => $this->account->token, //填写你设定的key
			'encodingaeskey' => $this->account->encodingaeskey, //填写加密用的EncodingAESKey
			'appid' => $this->account->appid, //填写高级调用功能的app id
			'appsecret' => $this->account->appsecret, //填写高级调用功能的密钥
		);
		$weObj = new Wechat($this->options);
		$weObj->valid();
	}

	public function index($id) {
		$this->init($id);
		Log::debug('通过检查');
		$rev = $this->weObj->getRev();
		$type = $this->rev->getRevType();

		Log::debug('记录用户操作信息');
		//记录用户操作信息
		Message::create([
			'accountid' => $this->account->id,
			'tousername' => $this->rev->getRevTo(),
			'fromusername' => $this->rev->getRevFrom(),
			'msgtype' => $type,
			'createtime' => $this->rev->getRevCtime(),
			'context' => json_encode($this->rev->getRevData()), //TODO
		]);

		Log::debug('响应用请求');
		switch ($type) {
			case Wechat::MSGTYPE_TEXT:
				$content = $rev->getRevContent();
				$this->doTextReply($id, $content);
				break;
			case Wechat::MSGTYPE_EVENT:
				$key = $rev->getRevEvent()['key'];
				$event = $rev->getRevEvent()['event'];
				$this->doEventReply($key, $event, $id);
				break;
			case Wechat::MSGTYPE_IMAGE:
				$weObj->text('')->reply();
				break;
			default:
				$weObj->text("非常抱谦，暂时找不到相关服务，有问题请找客服")->reply();
		}
	}

	protected function doTextReply($uid, $keyWord) {
		$reply = Reply::whereRaw('uid =? and matchtype = ? and matchvalue = ?', [$uid, 'text', $keyWord])->first();
		if ($reply) {
			$type = $reply->msgtype;
			$this->weObj->$type(json_decode($reply->content))->reply();
		} else {
			Log::error('没有配置菜单响应用内容');
		}
	}

	protected function doEventReply($key, $event, $uid) {
		switch ($event) {
			case Wechat::EVENT_SUBSCRIBE:
				//TODO 保存用户到粉丝表
				if ($this->account->subscribeenable && $this->account->subscribecontent) {
					$content = json_decode(json, true);
					if ($account->suscribemsgtype == 'text') {
						$weObj->text($content['content'])->reply();
					} else if ($account->suscribemsgtype == 'news') {
						$weObj->news(json_decode($content))->reply();
					}
				}
				break;
			case Wechat::EVENT_MENU_CLICK:
				if ($key) {
					$reply = Reply::whereRaw('uid =? and matchtype = ? and matchvalue = ?', [$uid, $event, $key])->first();
					if ($reply) {
						$this->doMatchReply($reply);
					} else {
						Log::error('没有配置菜单响应用内容');
						$this->doNoMatchReply();
					}
				} else {
					$weObj->text('no key')->reply();
				}
				break;
			default:
				$this->doNoMatchReply();
				break;
		}
	}

	private function doMatchReply($reply) {
		$type = $reply->msgtype;
		//匹配关键字回复
		if ($reply->content) {
			$content = json_decode($reply->content, true);
			switch ($type) {
				case Wechat::MSGTYPE_TEXT:
					$this->weObj->text($content['text'])->reply();
					break;
				case Wechat::MSGTYPE_NEWS:
					$this->weObj->news($news)->reply();
					break;
				default:
					Log::error('unknow no match msg type:' . $this->account->nomatchmsgtype);
					$this->weObj->text('')->reply();
					break;
			}
		} else {
			//没有定义时，回复空
			$this->weObj->text('')->reply();
		}
	}

	private function doNoMatchReply() {
		//已经设置无匹配关键字回复
		if ($this->account->nomatchenable && $this->account->nomatchcontent) {
			$content = json_decode($this->account->nomatchcontent, true);
			switch ($this->account->nomatchmsgtype) {
				case Wechat::MSGTYPE_TEXT:
					$this->weObj->text($content['text'])->reply();
					break;
				case Wechat::MSGTYPE_NEWS:
					$this->weObj->news($news)->reply();
					break;
				default:
					Log::error('unknow no match msg type:' . $this->account->nomatchmsgtype);
					$this->weObj->text('')->reply();
					break;
			}
		} else {
			//没有定义时，回复空
			$this->weObj->text('')->reply();
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