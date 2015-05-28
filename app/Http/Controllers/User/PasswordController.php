<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Profile;
use App\User;
use Auth;
use Illuminate\Http\Request;

use Illuminate\Contracts\Auth\Authenticatable;

class PasswordController extends Controller {


   private $redirectTo='/auth/logout';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}


	/**
	 * 显示用户设置信息
	 *
	 * @return Response
	 */
	public function show() {
		$user = User::findOrFail(Auth::user()->id);
		$profile = Profile::where('uid', '=', $user->id)->first();
		return view('user.password', ['user' => $user, 'profile' => $profile]);
	}

    /**
     * Reset the given user's password.
     *
     * @param  Request  $request
     * @return Response
     */
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed',
        ]);

        $credentials = $request->only(
           'password', 'password_confirmation'
        );
        $user = User::findOrFail(Auth::user()->id);
        $user->password = bcrypt($credentials['password']);

        if($user->save()){
            return redirect($this->redirectTo);
        }else{
            return redirect()->back()->withErrors(['msg'=>'修改密码失败']);
        }


    }

}