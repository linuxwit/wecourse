<?php namespace App\Witleaf\Wecourse;

use App\Account;
use Config;
use \App\Witleaf\Wechat\Wechat;

class Course {

	public function getWechat($accountId) {
		$account = Account::find($accountId);
		return $this->getWechatByAccount($account);
	}

	public function getWechatByAccount($account) {
		$options = array(
			'token' => $account->token, //填写你设定的key
			//'encodingaeskey' => '', //填写加密用的EncodingAESKey
			'appid' => $account->appid, //填写高级调用功能的app id
			'appsecret' => $account->appsecret, //填写高级调用功能的密钥
			'debug' => true,
		);
		return new Wechat($options);
	}

	/**
	 *返回平台支持的模块
	 *
	 *
	 */
	public function getModules($account) {
		$domain = Config::get('app.domain');
		$weObj = $this->getWechatByAccount($account);

		$funs = array(
			'讲师介绍' => array(
				'type' => 'view',
				'url' => $domain . '/teacher',
			),
			'最近课程' => array(
				'type' => 'view',
				'url' => $domain . '/course/lastest',
			),
			'往期回顾' => array(
				'type' => 'view',
				'url' => $domain . '/course/past',
			),
			'课程排表' => array(
				'type' => 'view',
				'url' => $domain . '/plan',
			),
			'关于我们' => array(
				'type' => 'view',
				'url' => $domain . '/aboutus',
			),
			'联系我们' => array(
				'type' => 'view',
				'url' => $domain . '/contactus',
			),
			'我的课程' => array(
				'type' => 'view',
				'url' => $domain . '/user/course',
			),
			'我要报名' => array(
				'type' => 'view',
				'url' => $domain . '/course',
			),
			'我要合作' => array(
				'type' => 'view',
				'url' => $domain . '/partner',
			),
		);

		foreach ($funs as $key => $item) {
			$funs[$key]['url'] = $weObj->getOauthRedirect($item['url'], $account->id, 'snsapi_base');
		}

		return $funs;
	}
}