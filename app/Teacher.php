<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model {

	protected $table = 'wc_teacher';

	protected $fillable = ['uid', 'title', 'avatar', 'content', 'summary', 'phone', 'mobile', 'address'];
}
