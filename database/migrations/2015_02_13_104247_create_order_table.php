<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderTable extends Migration {

	/**
	 * Run the migrations.
	 * 订单表，用于用户报名参加，如果用户没有注册，则进入填写表单界面，后台自动注册，并自动登录，跳到我的课程
	 * 如果用户已经注册并且登录，则直接报名，否则进入填写表单界面
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('order', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('outorderid')->nullable(); //外部定单ID
			$table->integer('uid')->nullable(); //报名人的用户ID,可以为空，
			$table->integer('itemid'); //参加的课程ID
			$table->string('itemtitle'); //参加的课程名称
			$table->decimal('price'); //价格
			$table->string('name', 20); // 姓名
			$table->string('mobile', 16); // 手机
			$table->string('copmany', 100); //公司
			$table->string('title'); //职位
			$table->string('spm'); //广告码，用于统计效果
			$table->string('source'); //推荐人,谁介绍来报名的
			$table->string('country')->nullable();
			$table->string('provice')->nullable();
			$table->string('city')->nullable();
			$table->string('address')->nullable();
			$table->integer('status')->default(0); //订单状态
			$table->boolean('paystatus')->default(0); //是否付款
			$table->integer('paytype'); //付款方式 前期只支付线下付款，银行转帐，面对面交易
			$table->string('mark')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('order');
	}

}
