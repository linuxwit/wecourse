<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 * 用户表
	 * 用户分为：一种是超级管理员，一种是合作伙伴，一种是普通用户
	 * 合作伙伴 可以管理微信公众帐号，可以查看用户购买的购买课程
	 * 普通用户只能参与网站的前台功能（如报名，评论，分享）
	 * 用户可以通过手机或者邮箱进入系统
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('mobile')->nullable()->index(); //手机
			$table->string('password', 60);
			$table->boolean('isadmin')->default(0); //是否是管理员
			$table->boolean('ispartner')->default(0); //是否是合作伙伴
			$table->boolean('block')->default(0); //是否被锁定
			$table->string('openid')->nullable(); //微信open_id
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('users');
	}

}
