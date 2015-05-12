<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model {

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $table = 'wc_teacher';

	protected $fillable = ['name', 'uid', 'title', 'avatar', 'content', 'summary', 'phone', 'mobile', 'address'];

	public function course() {
		return $this->hasMany('App\Course', 'teacherid', 'id');
	}
}
