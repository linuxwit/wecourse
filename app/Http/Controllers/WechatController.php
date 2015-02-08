<?php namespace App\Http\Controllers;

use \App\Witleaf\Wechat\Wechat;

Class WechatController extends Controller {
	public function index() {
		$options = array(
			'token' => 'tokenaccesskey', //填写你设定的key
			'encodingaeskey' => 'encodingaeskey', //填写加密用的EncodingAESKey
			'appid' => 'wx75a1158641f7f353', //填写高级调用功能的app id
			'appsecret' => '5fc8f2e348998da9f0e64d450f51e105', //填写高级调用功能的密钥
		);
		$weObj = new Wechat($options);
		echo $weObj->valid();
		$type = $weObj->getRev()->getRevType();
		switch ($type) {
			case Wechat::MSGTYPE_TEXT:
				$weObj->text("hello, I'm wechat")->reply();
				exit;
				break;
			case Wechat::MSGTYPE_EVENT:
				$weObj->text('事件')->reply();
				break;
			case Wechat::MSGTYPE_IMAGE:
				$weObj->text('图片')->reply();
				break;
			default:
				$weObj->text("help info")->reply();
		}
	}
}