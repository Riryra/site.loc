<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class ProductController extends Controller 
{
	public function create() {
		return view('product.create');
	}

	public function createProduct(Request $request) {

		$image = '';

		if ($request->hasfile('product-image') === true) {
			$image = $request->file('product-image')->store('products', 'images');
		}

		$product = new Products();

		$product->name = $request->input('product-name');
		$product->price = $request->input('product-price');
		$product->description = $request->input('product-desc');
		$product->image = $image;

		$product->save();

		return redirect('/shop');
	}

}