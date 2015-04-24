<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMpReplyTable extends Migration {

	/**
	 * Run the migrations.
	 * 自动回复的图文定义
	 * 用于保存用户自定义的回复内容
	 * 当用户点击菜单，发送如果合作：回复相应内容
	 *目录
	 *1 回复文本消息
	 *2 回复图片消息
	 *3 回复语音消息
	 *4 回复视频消息
	 *5 回复音乐消息
	 *6 回复图文消息
	 * @return void
	 */
	public function up() {
		Schema::create('mp_reply', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('uid');
			$table->integer('accountid');
			$table->string('matchtype', 120); //消息回复匹配规则 菜单点击 event | 发送关键字 word | 正则表达式 regex
			$table->string('matchvalue', 500);
			$table->string('msgtype', 10); //text,image,voice,music,video,news,lbs,biz
			$table->text('content'); //消息内容，使用JSON来保存
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('mp_reply');
	}

}
