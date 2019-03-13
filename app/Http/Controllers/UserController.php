<?php

namespace App\Http\Controllers;

use App\Users;
use http\Client\Curl\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller 
{
	public function signUp() {
		return view('signup');
	}

	public function sign(Request $request) {
		'Sign process' . PHP_EOL;
		echo '<pre>';

		if ($request->input('password1') === $request->input('password2')) {
			$user = new Users();

			$user->password = $user->generatePassword($request->input('password1'));
			$user->email = $request->input('email');
			$user->username = $request->input('username');
			$user->type = Users::TYPE_USER;
			
			$user->age = 18;

			if ($user->save() === true) {
				return redirect('/');
			} else {
				return redirect (404);
			}

			var_dump($user);
		}

		 /*$user = new Users();

        $user->username = $_POST['username']*/

	}

	public function login() {
		return view('login');
	}

	public function doLogin(Request $request) {
		$user = Users::where(['email' => $request->input('email')])->first();

		if ($user->password === $user->generatePassword($request->input('password'))) {

			\Illuminate\Support\Facades\Auth::loginUsingId($user->id);
		} else {
			\Illuminate\Support\Facades\Auth::logout();
		}
		return redirect ('/');
	}

	public function logout(Request $request)
	{
		Auth::logout();

		return redirect ('/login');
	}
}
