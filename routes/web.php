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

Route::get('/home/bulk', 'ProductController@bulk');

Route::get('/product', function() {
    return view('product');
});

Route::get('/Mobiles', function() {
    $data = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')
    ->where(["category"=>"Mobiles"])->paginate(3);

    return view('mobile', compact('data'));
});

Route::get('/Laptops', function() {
    $data = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')
    ->where(["category"=>"Laptops"])->paginate(3);

    return view('laptop', compact('data'));
});

Route::get('/Watches', function() {
    $data = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')
    ->where(["category"=>"Watches"])->paginate(3);
   
    return view('watch', compact('data'));
});

Route::get('/search', 'ProductController@search');

Route::middleware('auth')->group(function() {
    Route::post('{id}/cart', 'ProductController@AddToCart');
    Route::get('/{id}/cart', 'ProductController@cart');
    Route::post('{id}/buy', 'ProductController@buy');
    Route::post('/{id}/cart/remove', 'ProductController@remove');
    Route::get('/{id}/cart/remove', 'ProductController@view');
});

// Route::post('{id}/cart', 'ProductController@AddToCart')->middleware('LoginCheck');

Route::get('details/{id}', 'ProductController@details');

// Route::get('/{id}/cart', 'ProductController@cart')->middleware('auth');

// Route::post('{id}/buy', 'ProductController@buy')->middleware('LoginCheck');

// Route::post('/{id}/cart/remove', 'ProductController@remove')->middleware('LoginCheck');
// Route::get('/{id}/cart/remove', 'ProductController@view')->middleware('LoginCheck');

Route::get('{id}/buy/payment', 'ProductController@payment');

Route::get('/all', 'ProductController@viewall');
Route::post('/{id}/checkout', 'ProductController@checkout');
Route::get('/{id}/cart_history', 'ProductController@history');




















