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
Route::get('/home/second', 'ProductController@userssecond');
Route::get('/home/secondway', 'ProductController@anotherway');

Route::get('/home/bulk', 'ProductController@bulk');

Route::get('/product', function() {
    return view('product');
});

Route::get('/Mobiles', function() {
    $data = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')
    ->where(["category"=>"Mobiles"])->paginate(12);

    return view('mobile', compact('data'));
});

Route::get('/Laptops', function() {
    $data = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')
    ->where(["category"=>"Laptops"])->paginate(12);

    return view('laptop', compact('data'));
});

Route::get('/Watches', function() {
    $data = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')
    ->where(["category"=>"Watches"])->paginate(12);
   
    return view('watch', compact('data'));
});

Route::get('/search', 'ProductController@search');
Route::get('/home/{id}', 'ProductController@product');

Route::middleware('auth')->group(function() {
    Route::get('/{id}/profile','ProductController@profile');
    // Route::post('/{id}', 'ProductController@product');
    // Route::post('{id}/cart', 'ProductController@AddToCart');
    Route::get('/{id}/cart', 'ProductController@cart');
    Route::delete('/cart/remove', 'ProductController@delete');
    Route::post('{id}/buy', 'ProductController@buy');
    Route::post('/{id}/cart/remove', 'ProductController@remove');
    Route::get('/{id}/cart/remove', 'ProductController@view');
    Route::get('/{id}/history', 'ProductController@orderHistory');
});

Route::post('{id}/cart', 'ProductController@AddToCart')->middleware('auth','LoginCheck');

// Route::post('{id}/cart', 'ProductController@AddToCart')->middleware('LoginCheck');

Route::get('details/{id}', 'ProductController@details');

Route::get('{id}/buy/payment', 'ProductController@payment');

Route::get('/all', 'ProductController@viewall');
Route::post('/{id}/checkout', 'ProductController@checkout');
Route::get('/{id}/cart_history', 'ProductController@history');




















