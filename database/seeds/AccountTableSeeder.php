<?php
use App\Account;
use Illuminate\Database\Seeder;

class AccountTableSeeder extends Seeder {
	public function run() {
		$menu = array(
			"button" => array(
				array(
					'name' => '培训课程',
					'sub_button' => array(
						array('type' => 'click', 'name' => '讲师介绍', 'key' => '讲师介绍'),
						array('type' => 'click', 'name' => '课程介绍', 'key' => '课程介绍'),
						array('type' => 'click', 'name' => '课程排表', 'key' => '课程排表'),
						array('type' => 'click', 'name' => '往期回顾', 'key' => '往期回顾'),
						array('type' => 'click', 'name' => '最新课程', 'key' => '最新课程'),
					),
				),
				array(
					'name' => '个人中心',
					'sub_button' => array(
						array('type' => 'click', 'name' => '我要报名', 'key' => '我要报名'),
						array('type' => 'click', 'name' => '我要合作', 'key' => '我要合作'),
						array('type' => 'click', 'name' => '我的课程', 'key' => '我的课程'),
					),
				),
				array(
					'name' => '学习互动',
					'sub_button' => array(
						array('type' => 'click', 'name' => '在线互动', 'key' => '在线互动'),
						array('type' => 'click', 'name' => '联系我们', 'key' => '联系我们'),
					),
				),
			),
		);
		Account::create([
			'uid' => 2,
			'name' => '学习互动吧',
			'type' => '服务号',
			'audit' => 1,
			'appid' => 'wx75a1158641f7f353',
			'appsecret' => '5fc8f2e348998da9f0e64d450f51e105',
			'token' => 'course20150208',
			'encodingaeskey' => '',
			'menu' => json_encode($menu),
			'subscribeenable' => '1',
			'subscribemsgtype' => 'text',
			'subscribecontent' => json_encode(array('content' => '欢迎关注')),
			'nomatchenable' => '1',
			'nomatchmsgtype' => 'text',
			'nomatchcontent' => json_encode(array('content' => '暂时没有相关内容，有问题找客服')),
			'times' => 0,
		]);
	}
}