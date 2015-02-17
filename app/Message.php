<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

	protected $table = 'mp_message';
	protected $fillable = array('accountid', 'tousername', 'fromusername', 'msgtype', 'type', 'context');
}
