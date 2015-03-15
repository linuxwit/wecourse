<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model {
	use SoftDeletes;
	protected $table = 'media';
	protected $fillable = ['uid', 'name', 'mimetype', 'localpath', 'cloudurl', 'sync', 'type'];

}
