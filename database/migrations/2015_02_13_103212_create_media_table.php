<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediaTable extends Migration {

	/**
	 * Run the migrations.
	 * 多媒体表
	 * 存放图片，视频
	 * @return void
	 */
	public function up() {
		Schema::create('media', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('uid');
			$table->string('name');
			$table->string('localpath'); //存在本地服务器的地址
			$table->string('cloudurl'); //存在第三方云平台上
			$table->boolean('sync')->default(0); //是否同步到第三方平台
			$table->string('type', 10); //image video
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
		Schema::drop('media');
	}

}
