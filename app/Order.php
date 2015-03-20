<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	protected $table = 'order';

	protected $fillable = ['name', 'mobile', 'company', 'title', 'spm', 'source', 'country', 'provice', 'city', 'itemid', 'itemtitle', 'uid', 'price', 'paytype'];
}
