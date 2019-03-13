<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   
    return view('welcome', ['title' => 'Start page']);
});

Route::get('/articles/{cat}/{id}', function ($var1 = null, $var2){
	echo 'cat' . $var1 . 'id' . $var2;
})->where(['id' => '[0-9]+', 'cat' => '[a-z]+']);

Route::group(['prefix' => 'admin'], function(){
	Route::get('/post/create', function(){
		echo 'create post';
	});
	
	Route::get('/post/edit', function(){
		echo 'edit post';
	});
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin_check']], function() {
	
	Route::get('/', 'AdminController@index');

	Route::get('/create-product', 'ProductController@create');

    Route::post('/create-product', 'ProductController@createProduct');

    Route::get('/change-status/{id}/{status}', 'AdminController@changeStatus');
});

Route::get('/shop', 'ShopController@index');

Route::get('/shop/product/{id}', 'ShopController@showProduct');

Route::get('/basket', 'ShopController@basket');

Route::get('/addBasket', 'ShopController@addBasket');

Route::get('/deleteBasket', 'ShopController@deleteBasket');

Route::get('/qtBasket', 'ShopController@qtBasket');

Route::get('/make-order', 'ShopController@makeOrder');

Route::post('/make-order', 'ShopController@saveOrder');

Route::get('/orders', 'ShopController@orders');

Route::get('/signup', 'UserController@signUp');

Route::post('/signup', 'UserController@sign')->middleware('pass_check');

Route::get('/login', 'UserController@login');

Route::post('/login', 'UserController@doLogin');

Route::get('/logout', 'UserController@logout');
