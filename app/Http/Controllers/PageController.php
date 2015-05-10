<?php namespace App\Http\Controllers;

class PageController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function aboutUs() {
		$this->autoLoginInWechat();
		$result = $this->openid;
		return view('page.aboutus', ['result' => $result]);
	}

}
