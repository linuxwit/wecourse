<?php namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class ProfileController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Update the user's profile.
	 *
	 * @return Response
	 */
	public function updateProfile(Authenticatable $user) {
		return view('user.profile', ['user' => Profile::findOrFail($user->id)]);
	}

	/**
	 * 显示用户设置信息
	 *
	 * @return Response
	 */
	public function show() {
		$user = User::findOrFail(Auth::user()->id);
		$profile = Profile::where('uid', '=', $user->id)->first();
		return view('user.profile', ['user' => $user, 'profile' => $profile]);
	}

}