<?php namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Profile;
use App\User;
use Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
	public function updateProfile(Request $req) {


        $this->validate($req,[
            'realname'=>'max:16',
            'phone'=>'integer',
            'title'=>'max:50',
            'qq'=>'max:16',
            'sign'=>'max:500',
        ]);
        $profile=new Profile();
        $profile->realname=Input::get('realname','');
        $profile->sex=Input::get('sex',3);
        $profile->weixin=Input::get('weixin','');
        $profile->qq=Input::get('qq','');
        $profile->weibo=Input::get('weibo','');
        $profile->phone=Input::get('phone','');
        $profile->country=Input::get('country','');
        $profile->provice=Input::get('provice','');
        $profile->city=Input::get('city','');
        $profile->company=Input::get('company','');
        $profile->title=Input::get('title','');
        $profile->adress=Input::get('address','');
        $profile->sign=Input::get('sign','');


       $result= Profile::updateOrCreate(array('uid' => Auth::user()->id), $profile->getAttributes());
        if($result){
            return redirect('/user/profile')->withSuccess('修改成功');
        }else{
            return redirect()->back()->withErrors(['msg'=>'修改用户信息失败']);
        }
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