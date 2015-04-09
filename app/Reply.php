<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model {
	protected $table = 'mp_reply';

	protected $fillable = ['uid', 'accountid', 'matchtype', 'matchvalue', 'msgtype', 'content'];
}
