<?php namespace App\Witleaf\Wecourse;

use Config;

class Course {

	/**
	 *返回平台支持的模块
	 *
	 *
	 */

	public function getModules() {
		$domain = Config::get('app.domain');
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

		return $funs;
	}
}