<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWcCommentTable extends Migration {

	/**
	 * Run the migrations.
	 * 课程的评论
	 * @return void
	 */
	public function up() {
		Schema::create('wc_comments', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('courseid'); //课程ID
			$table->string('text');
			$table->integer('uid');
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
		Schema::drop('wc_comments');
	}

}
