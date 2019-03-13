<?php

namespace App\Http\Middleware;

use Closure;

class PassCheck 
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
        if ($this->_check($request->input('password1'), $request->input('password2')) === true) {
            return $next($request);
        } else {
            echo 'wrong passwords';
            exit;
            return redirect('/');
        }
    }

    private function _check($pass1, $pass2) {
        if ($pass1 === $pass2) {
            return true;
        } else {
            return false;
        }
    }
	
}