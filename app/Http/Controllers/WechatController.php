<?php namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Log;
use \App\Account;
use \App\Message;
use \App\Reply;
use \App\Witleaf\Wechat\Wechat;

Class WechatController extends BaseController {
	protected $account;
	protected $weObj;
	protected $options;
	public function ping($id) {
		$model = Account::find($id);
		if ($model) {
			echo 'ok ';
			$this->init($id);
		} else {
			echo '非法帐号';
		}
	}
	protected function init($id) {
		$this->account = Account::find($id);
		if (!$this->account) {
			Log::error('无法识别请求 id:' . $id);
			return false;
		}
		$this->account->times = $this->account->times + 1;
		$this->account->save();
		$this->options = array(
			'token' => $this->account->token, //填写你设定的key
			'encodingaeskey' => $this->account->encodingaeskey, //填写加密用的EncodingAESKey
			'appid' => $this->account->appid, //填写高级调用功能的app id
			'appsecret' => $this->account->appsecret, //填写高级调用功能的密钥
		);
		log::debug(json_encode($this->options));
		$this->weObj = new Wechat($this->options);
		Log::debug('begin valid');
		$this->weObj->valid();
	}
	public function index($id) {
		Log::debug('收到请求' . $id);
		$this->init($id);
		Log::debug('通过检查');
		$rev = $this->weObj->getRev();
		$type = $rev->getRevType();
		Log::debug('记录用户操作信息');
		//记录用户操作信息
		Message::create([
			'accountid' => $this->account->id,
			'tousername' => $rev->getRevTo(),
			'fromusername' => $rev->getRevFrom(),
			'msgtype' => $type,
			'createtime' => $rev->getRevCtime(),
			'context' => json_encode($rev->getRevData()), //TODO
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
				Log::debug("响应事件,key:{$key} ,event:{$event}");
				$this->doEventReply($key, $event, $id);
				break;
			case Wechat::MSGTYPE_IMAGE:
				$this->weObj->text('')->reply();
				break;
			default:
				$this->weObj->text("非常抱谦，暂时找不到相关服务，有问题请找客服")->reply();
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

	protected function doEventReply($key, $event, $accountid) {
		switch ($event) {
			case Wechat::EVENT_SUBSCRIBE:
				//TODO 保存用户到粉丝表
				if ($this->account->subscribeenable && $this->account->subscribecontent) {
					$countent = $this->account->subscribecontent;
					if ($account->suscribemsgtype == 'text') {
						$weObj->text($countent)->reply();
					} else if ($account->suscribemsgtype == 'news') {
						$weObj->news(json_decode(json_decode($countent, true)))->reply();
					}
				}
				break;
			case Wechat::EVENT_UNSUBSCRIBE:
				Log::info('unsubcribe');
				break;
			case Wechat::EVENT_MENU_CLICK:
				$reply = Reply::whereRaw('accountid =? and matchtype = ? and matchvalue = ?', [$accountid, $event, $key])->first();
				if ($reply) {
					Log::debug('处理菜单事件');
					$this->doMatchReply($reply);
				} else {
					Log::error('没有配置菜单响应用内容');
					$this->doNoMatchReply();
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
		Log::debug('处理Match回复,消息类型为' . $type);
		if ($reply->content) {
			Log::debug('处理Match回复,内容为' . $reply->content);

			switch ($type) {
				case Wechat::MSGTYPE_TEXT:
					$this->weObj->text($reply->content)->reply();
					break;
				case Wechat::MSGTYPE_NEWS:
					$content = json_decode($reply->content, true);
					$this->weObj->news($content)->reply();
					break;
				case 'keyword':
					//TODO 关键字回复
					$this->weObj->text($reply->content)->reply();
					break;
				case 'module':
					$content = json_decode($reply->content, true);
					$this->weObj->text($reply->content)->reply();
					break;
				default:
					Log::error('unknow no match msg type:' . $this->account->nomatchmsgtype);
					$this->weObj->text('')->reply();
					break;
			}
		} else {
			Log::debug('回复内容为空');
			//没有定义时，回复空
			$this->weObj->text('')->reply();
		}
	}
	private function doNoMatchReply() {
		//已经设置无匹配关键字回复
		if ($this->account->nomatchenable && $this->account->nomatchcontent) {
			switch ($this->account->nomatchmsgtype) {
				case Wechat::MSGTYPE_TEXT:
					$this->weObj->text($this->account->nomatchcontent)->reply();
					break;
				case Wechat::MSGTYPE_NEWS:
					$content = json_decode($this->account->nomatchcontent, true);
					$this->weObj->news($content)->reply();
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