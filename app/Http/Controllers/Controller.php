<?php namespace App\Http\Controllers;

use App\Media;
use App\Witleaf\Wecourse\Course;
use Config;
use Cookie;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Input;
use Log;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

abstract class Controller extends BaseController {

	private $OPEN_ID_KEY = 'openid';

	protected $opneid = '';
	use DispatchesCommands, ValidatesRequests;

	protected function autoLoginInWechat() {
		$this->openid = Cookie::get($this->OPEN_ID_KEY, '');
		if (empty($this->openid)) {
			$code = Input::get('code');
			$state = Input::get('state');
			if ($state && $code) {
				$course = new Course();
				$wechat = $course->getWechat($state);
				if ($wechat) {
					$result = $wechat->getOauthAccessToken();
					if ($result) {
						$this->openid = $result['openid'];
						Cookie::forever($this->OPEN_ID_KEY, $this->openid);
					}
				}
			}
		}

		//TODO, 如果绑定了微信，则可以自动进入系统
	}

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
		Log::debug('upload file:' . $error);
		if ($error) {
			$media->sync = -1;
		} else {
			$media->sync = 1;
			$media->cloudurl = $media->id;
		}
		$update = $media->update();
		Log::debug('upload error' . json_encode($error));
		Log::debug('upload result:' . json_encode($ret));
		return $media;
	}

}
