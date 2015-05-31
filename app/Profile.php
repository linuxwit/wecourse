<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

	protected $table = 'profile';

    protected $fillable=['realname','sex','weixin','qq','weibo','phone','country','provice','city','adress','company','title','sign'];

    protected  $primaryKey='uid';
}