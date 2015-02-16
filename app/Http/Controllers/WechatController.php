<?php namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use \App\Witleaf\Wechat\Wechat;

Class WechatController extends BaseController {
	public function index() {
		$options = array(
			'token' => 'course20150208', //填写你设定的key
			'encodingaeskey' => '', //填写加密用的EncodingAESKey
			'appid' => 'wx75a1158641f7f353', //填写高级调用功能的app id
			'appsecret' => '5fc8f2e348998da9f0e64d450f51e105', //填写高级调用功能的密钥
		);

		$weObj = new Wechat($options);
		$weObj->valid();
		$type = $weObj->getRev()->getRevType();
		switch ($type) {
			case Wechat::MSGTYPE_TEXT:
				$weObj->text("hello, I'm wechat")->reply();
				exit;
				break;
			case Wechat::MSGTYPE_EVENT:
				$result = array(
					"0" => array(
						'Title' => 'msg title' . $weObj->getRev()->getRevEvent()['key'],
						'Description' => 'summary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary textsummary text' . $weObj->getRev()->getRevEvent()['event'],
						'PicUrl' => 'http://lovejog.qiniudn.com/6001168622476609005',
						//'Url' => 'http://new.lovejog.com/mobile?id=' . $weObj->getRev()->getRevFrom(),
					),
				);
				$weObj->news($result)->reply();
				break;
			case Wechat::MSGTYPE_IMAGE:
				$weObj->text('图片')->reply();

				break;
			default:
				$weObj->text("help info")->reply();
		}
	}

	public function setmenu() {
		$options = array(
			'token' => 'course20150208', //填写你设定的key
			'encodingaeskey' => '', //填写加密用的EncodingAESKey
			'appid' => 'wx75a1158641f7f353', //填写高级调用功能的app id
			'appsecret' => '5fc8f2e348998da9f0e64d450f51e105', //填写高级调用功能的密钥
		);
		$weObj = new Wechat($options);
		$menu = $weObj->getMenu();
		$newmenu = array(
			"button" => array(
				array(
					'name' => '培训课程',
					'sub_button' => array(
						array('type' => 'click', 'name' => '老师介绍', 'key' => 'MENU_KEY_TEACH'),
						array('type' => 'click', 'name' => '课程介绍', 'key' => 'MENU_KEY_COURSE'),
						array('type' => 'click', 'name' => '课程排表', 'key' => 'MENU_KEY_PLAN'),
						array('type' => 'click', 'name' => '往期回顾', 'key' => 'MENU_KEY_HISTORY'),
						array('type' => 'click', 'name' => '最新课程', 'key' => 'MENU_KEY_NEWS'),
					),
				),
				array(
					'name' => '我要加入',
					'sub_button' => array(
						array('type' => 'click', 'name' => '我要报名', 'key' => 'MENU_KEY_JOIN'),
						array('type' => 'click', 'name' => '我要合作', 'key' => 'MENU_KEY_PRATER'),
						array('type' => 'click', 'name' => '我的课程', 'key' => 'MENU_KEY_MYCOURSE'),
					),
				),
				array(
					'name' => '学习互动',
					'sub_button' => array(
						array('type' => 'click', 'name' => '在线互动', 'key' => 'MENU_KEY_NEWS'),
						array('type' => 'click', 'name' => '联系我们', 'key' => 'MENU_KEY_ABOUTUS'),
					),

				),
			),
		);
		echo $result = $weObj->createMenu($newmenu);

	}
}