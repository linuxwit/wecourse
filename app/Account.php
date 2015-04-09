<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model {

	protected $table = 'mp_account';

	protected $fillable = ['uid',
		'name',
		'type',
		'audit',
		'appid',
		'appsecret',
		'token',
		'encodingaeskey',
		'menu',
		'backupmenu',
		'subscribeenable',
		'subscribemsgtype',
		'subscribecontent',
		'nomatchenable',
		'nomatchmsgtype',
		'nomatchcontent',
		'times',
	];
}
