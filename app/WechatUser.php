<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class WechatUser extends Model {

	protected $table = 'wechat_user';
	protected $fillable = [
		'uid'
		, 'accountid'
		, 'subscribe'
		, 'openid'
		, 'nickname'
		, 'sex'
		, 'city'
		, 'country'
		, 'province'
		, 'language'
		, 'headimgurl'
		, 'subscribe_time'
		, 'unionid'
		, 'group_id'
		, 'group_name'
		, 'realname'
		, 'telphone'
		, 'mobile'
		, 'job_title'
		, 'address'
		, 'company',
	];

}
