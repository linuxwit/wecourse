<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMpAccountTable extends Migration {
	/**
	 * Run the migrations.
	 * 公众帐号
	 * 一个用户对应多个公众帐号
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('mp_account', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('uid');
			$table->string('name');
			$table->string('type', 10); //服务号｜订阅号｜企业号
			$table->boolean('audit')->default(1);
			$table->string('appid'); //填写高级调用功能的app id
			$table->string('appsecret'); //填写高级调用功能的密钥
			$table->string('token'); //填写你设定的key
			$table->string('encodingaeskey')->nullable(); //填写加密用的EncodingAESKey

			$table->text('menu')->nullable(); //菜单
			$table->text('backupmenu')->nullable(); //菜单备份，防止用户设置错误，以便恢复
			$table->string('username')->nullable(); //帐号
			$table->string('password')->nullable(); //密码
			$table->boolean('subscribeenable')->defualt(0); //关注回复
			$table->string('subscribemsgtype')->nullable(); //回复类型
			$table->text('subscribecontent')->nullable(); //定义回复消息内容，这里使用json
			$table->boolean('nomatchenable')->defualt(0); //无匹配关键词时回复
			$table->string('nomatchmsgtype')->nullable(); //回复类型
			$table->text('nomatchcontent')->nullable(); //定义回复消息内容，这里使用json
			$table->integer('maxlbslength')->default(1000); //LBS最大查询距离（米）
			$table->integer('times')->defualt(0); //接口处理次数
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
		Schema::drop('mp_account');
	}
}