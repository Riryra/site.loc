<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class AdminController extends Controller 
{
	public function index(){
		$orders = Order::all();
		return view('admin.index', ['orders' => $orders]);
	}

	public function changeStatus($id, $status) {
		$order = Order::find($id);

		$order->status = (int)$status;

		$order->update();

		return redirect('/admin');
		var_dump($id, $status); exit;
	}
} 