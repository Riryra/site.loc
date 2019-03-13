<?php

namespace App\Http\Controllers;

use App\Order;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

Class ShopController extends Controller 
{
	public function index() {

		$products= Session::get('products');

		if ($products === null) {
			Session::put('products', []);
		} 
		
		$products = Products::all();

		return view('shop.index', ['all' => $products, 'title' => 'shop' ]);
	}

	public function showProduct($id) {
		$product = Products::find($id);

		return view('shop.product', ['product' => $product]);
	}

	public function basket() {
		$products = Session::get('products');

		if (empty($products) === false) {
			$ids =array_keys($products);

			$basketProducts = Products::whereIn('id', $ids)->get();
		} else {
			$basketProducts = [];
		}
		return view('shop.basket', ['basketProducts' => $basketProducts]);
	}

	public function addBasket(Request $request) {
		$id = $request->input('id');
		$qt = $request->input('qt');

		$products = Session::get('products');

		if (isset($products[$id]) === true) {
			$products[$id] = $products[$id] + $qt;
		} else {
			$products[$id] = $qt;
		}

		Session::put('products', $products);

		return 200;
	}

	public function deleteBasket(Request $request) {
		$id = $request->input('id');

		$products = Session::get('products');

		if (isset($products[$id]) === true) {
			unset($products[$id]);
		}

		Session::put('products', $products);

		return redirect ('/basket');
	}

	public function qtBasket(Request $request) {
		$id = $request->input('id');
		$val = $request->input('val');

		$products = Session::get('products');

		if ($val === 'plus') {
			$products[$id] = $products[$id] + 1;
		} else if ($products[$id] <= 0) {
			unset($products[$id]);
		} else {
			$products[$id] = $products[$id] -1;
		}

		Session::put('products', $products);

		return redirect('/basket');
	}

	public function makeOrder() {
		$products = Session::get('products');

		if (empty($products) === false) {
			$ids = array_keys($products);

			$basketProducts = Products::whereIn('id', $ids)->get();
		} else {
			$basketProducts = [];
		}

		return view('shop.order', ['basketProducts' => $basketProducts]);
	}

	public function saveOrder(Request $request) {

		$order = new Order();

		$order->user_id = $request->input('user_id');
		$order->address = $request->input('address');

		$products = Session::get('products');

		$ids = [];

		foreach ($products as $id => $qt) {
			$ids[$id] = ['quantity' => $qt];
		}

		$order->save();

		$order->products()->sync($ids);

		Session::put('products', []);

		return redirect('/');
	}

	public function orders () {
		if (Auth::check()) {

			return view('shop.orders');
		}
	}
} 