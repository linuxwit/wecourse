<?php namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model {

	use SoftDeletes;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'wc_course';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['uid', 'teacherid', 'title', 'subtitle', 'city', 'cover', 'summary', 'content', 'address', 'begintime', 'endtime', 'currentprice', 'oldprice', 'joinercount', 'pv', 'uv'];
	public function teacher() {
		return $this->hasOne('Teacher', 'teacherid', 'id');
	}
}