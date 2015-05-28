<?php namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
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

        return 'abc';
	}

	/**
	 * 显示用户设置信息
	 *
	 * @return Response
	 */
	public function show() {
		$user = User::with('Profile')->findOrFail(Auth::user()->id);
		$profile = $user->profile;
        if(!$profile)
            $profile=new Profile();

		return view('user.profile', ['user' => $user, 'profile' => $profile]);
	}

}