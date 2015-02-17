<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMpMessageTable extends Migration {
	/**
	 * Run the migrations.
	 *  存放用户发送的消息
	 * @return void
	 */
	public function up() {
		Schema::create('mp_message', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('accountid'); //微信公众号对应用的ID
			$table->string('tousername')->nullable();;
			$table->string('fromusername')->nullable();
			$table->string('msgtype')->nullable();
			$table->integer('type')->nullable()->default(0); //接收：0 发送：1
			$table->time('createtime')->nullable();
			$table->text('context'); //使用json来保存
			/*$table->string('mediaid');
			$table->string('thumbmediaid');
			$table->string('msgid', 128);
			$table->string('location_x');
			$table->string('location_y');
			$table->string('scale');
			$table->string('title');
			$table->string('description');
			$table->string('url');
			$table->string('label'); //位置信息*/
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
		Schema::drop('mp_mesage');
	}
}