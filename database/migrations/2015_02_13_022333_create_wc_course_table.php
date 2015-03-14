<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWcCourseTable extends Migration {
	/**
	 * Run the migrations.
	 * 课程表
	 * @return void
	 */
	public function up() {
		Schema::create('wc_course', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('uid'); //添加人的ID
			$table->integer('teacherid'); //老师ID
			$table->string('title'); //标题
			$table->string('subtitle'); //副标题
			$table->string('cover'); //封面
			$table->string('summary')->nullable(); //简介
			$table->text('content'); //详细内容
			$table->string('city'); //开课城市
			$table->string('address'); //详细地址
			$table->datetime('begintime'); //开课时间
			$table->datetime('endtime'); //结束时间
			$table->decimal('currentprice'); //现价
			$table->decimal('oldprice'); //原价
			$table->integer('online')->default(0); //是否上线，
			$table->integer('joinercount')->default(0); //报名人数
			$table->integer('pv')->default(0); //浏览次数
			$table->integer('uv')->default(0);
			$table->text('mark')->nullable(); //mark
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
		Schema::drop('wc_course');
	}
}