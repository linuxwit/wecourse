<?php
use App\Reply;
use Illuminate\Database\Seeder;

class ReplyTableSeeder extends Seeder {
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
						array('type' => 'url', 'name' => '在线互动', 'url' => 'http://m.baidu.com'),
						array('type' => 'click', 'name' => '联系我们', 'key' => '联系我们'),
					),
				),
			),
		);
		foreach ($menu['button'] as $item) {
			if (isset($item['sub_button'])) {
				foreach ($item['sub_button'] as $sub_button) {
					if ($sub_button['type'] == 'click') {
						$news = array(
							"0" => array(
								'Title' => $sub_button['key'],
								'Description' => '',
								'PicUrl' => 'http://lovejog.qiniudn.com/6001168622476609005',
								'Url' => 'http://new.lovejog.com/mobile',
							),
						);
						Reply::create([
							'uid' => 2,
							'matchtype' => 'CLICK',
							'matchvalue' => $sub_button['key'],
							'msgtype' => 'news',
							'content' => json_encode($news),
						]);
					}
				}
			} else {
				$news = array(
					"0" => array(
						'Title' => $item['key'],
						'Description' => '',
						'PicUrl' => 'http://lovejog.qiniudn.com/6001168622476609005',
						'Url' => 'http://new.lovejog.com/mobile',
					),
				);
				Reply::create([
					'uid' => 2,
					'matchtype' => 'CLICK',
					'matchvalue' => $item['key'],
					'msgtype' => 'news',
					'content' => json_encode($news),
				]);
			}
		}

	}
}