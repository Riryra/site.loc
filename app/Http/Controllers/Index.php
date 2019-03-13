<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Index extends Controller 
{

	public function shop() {
		echo 'This is shop!';
	}
	
	public function ShowProduct($id) {
		echo 'Product number:' . $id;
	} 
	
}