<?php namespace App\Http\Controllers;

use App\Witleaf\Course;
use Request;

class PageController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function aboutUs() {
		$code = Request::getQueryString('code');
		$state = Request::getQueryString('state');
		$wechat = Course::getWechat($state);
		$result = $wechat->getOauthAccessToken();

		var_dump($result);

	}

}
