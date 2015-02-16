<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('profile', function (Blueprint $table) {
			$table->integer('uid')->unique(); //报名人的用户ID,可以为空，
			$table->string('realname');
			$table->string('sex');
			$table->string('weixin');
			$table->string('qq');
			$table->string('weibo');
			$table->string('phone'); //手机
			$table->string('country');
			$table->string('provice');
			$table->string('city');
			$table->string('adress');
			$table->string('company'); //公司
			$table->string('title'); //职位
			$table->string('sign'); //个性签名
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		//
	}

}
