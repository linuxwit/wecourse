<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWechatGroupTable extends Migration {

	private $name = 'wechat_group';
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create($this->name, function (Blueprint $table) {
			$table->integer('uid');
			$table->integer('accountid');
			$table->integer('id');
			$table->string('name', 32)->nullable();
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
		Schema::drop($this->name);
	}

}
