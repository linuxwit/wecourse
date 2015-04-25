<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class WechatGroup extends Model {
	protected $table = 'wechat_group';
	protected $fileeable = ['uid', 'accountid', 'id', 'name'];
}
