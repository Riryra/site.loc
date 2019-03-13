<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends \Illuminate\Foundation\Auth\User 
{
	const TYPE_ADMIN = 1;
    const TYPE_USER  = 0;
	
	private $salt = 'asdw';

	protected $table = 'users';

	public function generatePassword($password) {
		return md5($this->salt . $password);
	}

	public function orders() {
		return $this->hasMany('App\Order', 'user_id', 'id');
	}
}