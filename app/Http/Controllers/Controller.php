<?php namespace App\Http\Controllers;

use App\Media;
use Config;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Log;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	protected function upload($file, $uid, $folder = '/upload/image/teacher/') {
		$local = $folder . date('ymd') . '/';
		$clientName = $file->getClientOriginalName();
		$mime = $file->getMimeType();
		$mimeTye = $file->getMimeType();
		$newName = md5(date('ymdhis') . $clientName) . "." . $file->getClientOriginalExtension();
		$path = $file->move(storage_path() . $local, $newName);
		$media = Media::create(
			array('uid' => $uid,
				'name' => $clientName,
				'mimetype' => $mime,
				'localpath' => $local . $newName,
				'cloudurl' => $local . $newName,
				'sync' => 0,
				'type' => 'image',
			)
		);

		return $this->syncToQiniu($media, null, null);
	}

	/**
	 * 同步文件到七牛
	 * */
	protected function syncToQiniu($media, $params, $mime) {
		$config = Config::get('app.qiniu');
		Log::debug('config:' . json_encode($config));
		$accessKey = $config['ak'];
		$secretKey = $config['sk'];
		$bucketName = $config['bucket'];
		$upManager = new UploadManager();
		$auth = new Auth($accessKey, $secretKey);
		$token = $auth->uploadToken($bucketName);
		$file = storage_path() . $media->localpath;
		Log::debug('upload file:' . $file);
		list($ret, $error) = $upManager->putFile($token, $media->id, $file, $params, $mime);
		if ($error) {
			$media->sync = -1;
		} else {
			$media->sync = 1;
			$media->cloudurl = $media->id;
		}
		$media->update();
		Log::debug('upload error' . json_encode($error));
		Log::debug('upload result:' . json_encode($ret));
		return $media;
	}

}
