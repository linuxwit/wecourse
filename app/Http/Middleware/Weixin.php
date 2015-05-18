<?php namespace App\Http\Middleware;

use Closure;

class Weixin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		$inWeixin = true;
		if ($inWeixin) {
$callbackUrl='http://new.lovejog.com/we'
			return redirect()->guest('https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx520c15f417810387&redirect_uri=' . $callbackUrl . '&response_type=code&scope=snsapi_base&state=123#wechat_redirect');
		} else {
			return $next($request);
		}
	}

}
