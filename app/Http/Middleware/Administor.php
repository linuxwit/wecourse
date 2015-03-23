<?php namespace App\Http\Middleware;

use Auth;
use Closure;

class Administor extends Authenticate {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		parent::handle($request, $next);
		if (Auth::user() && Auth::user()->isadmin) {
			return $next($request);
		} else {
			if ($request->ajax()) {
				return response('Unauthorized.', 401);
			} else {
				return redirect()->guest('auth/login');
			}
		}

	}

}
