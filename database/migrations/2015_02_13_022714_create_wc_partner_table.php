<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWcPartnerTable extends Migration {

	/**
	 * Run the migrations.
	 * 合作伙伴
	 * 用户注册必须成为网站会员后，才可以申请成为合作伙伴（审核通过后）可以成为合作伙伴
	 * @return void
	 */
	public function up() {
		Schema::create('wc_partner', function (Blueprint $table) {
			$table->increments('id'); //
			$table->string('uid')->unique(); //唯一代码
			$table->string('openid'); // 谁的
			$table->string('name', 20); // 姓名
			$table->string('mobile', 16); // 手机
			$table->string('copmany'); //公司
			$table->string('title'); //职位
			$table->string('content'); //申请合作内容
			$table->integer('status')->defualt(0); //处理状态 0:等待，1:通过 2,没有通过
			$table->string('mark', 1); //备注
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('wc_partner');
	}

}
