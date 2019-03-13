<?php

namespace App\Http\Middleware;

use App\Users;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminCheck
{
	/**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
	public function handle($request, Closure $next)
	{
		if (Auth::user()->type === Users::TYPE_ADMIN) {
			return $next($request);
		} else {
			redirect('/');
		}
	}

}