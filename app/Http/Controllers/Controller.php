<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	public function upload($file, $key) {
		$accessKey = 'YG9uh4iBBLoeX20AeoAZKQIctJjn0fdH5UXoPNkC';
		$secretKey = 'lZAgNj8yCY_TmcPbcX4fPHPqB-Zg1h7IlaOyZpcb';
		$bucketName = 'wecourse';
		$upManager = new UploadManager();
		$auth = new Auth($accessKey, $secretKey);
		$token = $auth->uploadToken($bucketName);
		list($ret, $error) = $upManager->put($token, 'formput', 'hello world');
	}
}
