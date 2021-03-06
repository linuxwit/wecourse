<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWcTeacherTable extends Migration {

	/**
	 * Run the migrations.
	 * 讲师表
	 * @return void
	 */
	public function up() {
		Schema::create('wc_teacher', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('uid');
			$table->string('title');
			$table->string('avatar');
			$table->string('summary')->nullable();
			$table->text('content');
			$table->integer('pv')->defualt(0);
			$table->integer('uv')->defualt(0);
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
		Schema::drop('wc_teacher');
	}

}
