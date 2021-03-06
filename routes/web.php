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
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'ProductController@index');

Route::get('/product', function() {
    return view('product');
});

Route::get('/Mobiles', function() {
    $data = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')->where(["category"=>"Mobiles"])->get();

    return view('mobile', compact('data'));
});

Route::get('/Laptops', function() {
    $data = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')->where(["category"=>"Laptops"])->get();

    return view('laptop', compact('data'));
});

Route::get('/Watches', function() {
    $data = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')->where(["category"=>"Watches"])->get();
   
    return view('watch', compact('data'));
});

Route::post('{id}/cart', 'ProductController@AddToCart');

Route::get('details/{id}', 'ProductController@details');

Route::get('{id}/cart', 'ProductController@cart');

Route::get('{id}/buy', 'ProductController@buy');

Route::post('/{id}/cart/remove', 'ProductController@remove');
Route::get('/{id}/cart/remove', 'ProductController@view');

Route::get('{id}/buy/payment', 'ProductController@payment');

Route::get('/all', 'ProductController@viewall');




















