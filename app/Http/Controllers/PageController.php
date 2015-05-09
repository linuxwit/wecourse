<?php namespace App\Http\Controllers;

use App\Witleaf\Wecourse\Course;
use Input;

class PageController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function aboutUs() {
		$result = null;
		$code = Input::get('code');
		$state = Input::get('state');
		if ($state && $code) {
			$course = new Course();
			$wechat = $course->getWechat($state);
			if ($wechat) {
				$result = $wechat->getOauthAccessToken();
			}
		}

		return view('page.aboutus', ['result' => $result]);
	}

}
