<?php

use Illuminate\Support\Facades\Route;

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

// Rotas do user
Route::get('/', 'Admin\ProductController@indexWelcome');

// Update do user
Route::get('/profiles/{user}/profile', 'UserController@index')->name('profiles.user.index');
Route::get('/profiles/{user}/edit', 'UserController@edit')->name('profiles.user.edit');
Route::post('/profiles/update/{user}', 'UserController@update')->name('profiles.user.update');

Route::get('/products', 'Admin\ProductController@indexProd')->name('products.index');
Route::post('/products/search','Admin\ProductController@search')->name('products.search');
Route::get('/products/categories/{category}', 'Admin\ProductController@showCategory')->name('products.categories');
Route::get('/products/{product}/view', 'Admin\ProductController@view');

Route::get('/products/{product}/payment', 'ProductSeeController@view');

Route::view('/contact', 'contact');

Route::post('/contact/comment', 'CommentController@comment');

Route::view('/who-are-we', 'who-are-we');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/cart/add', function() {
    return redirect()->route('cart.index');
});

Route::post('/cart/add', 'CartController@add')->name('cart.add');
Route::delete('/cart/delete', 'CartController@delete')->name('cart.delete');
Route::post('/cart/finish', 'CartController@finish')->name('cart.finish');
Route::get('/cart/shop', 'CartController@shop')->name('cart.shop');
Route::post('/cart/cancel', 'CartController@cancel')->name('cart.cancel');
Route::post('/cart/discount', 'CartController@discount')->name('cart.discount'); 
Route::post('/cart/payment', 'CartController@payment')->name('cart.payment');

// Rotas do admin
Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function() {
    Route::get('/', function() {
        return view('admin.adminview');
    });
    Route::prefix('categories')->name('categories.')->group(function() {
        Route::get('/', 'CategoryController@index')->name('index');
        Route::get('/create', 'CategoryController@create')->name('create');
        Route::post('/category', 'CategoryController@category')->name('category');
        Route::get('{category}/edit', 'CategoryController@edit')->name('edit');
        Route::post('/update/{category}', 'CategoryController@update')->name('update');
        Route::get('/destroy/{category}', 'CategoryController@destroy')->name('destroy');
    });

    Route::prefix('products')->name('products.')->group(function() {
        Route::get('/', 'ProductController@index')->name('index');
        Route::get('/create', 'ProductController@create')->name('create');
        Route::post('/product', 'ProductController@product')->name('product');
        Route::get('{product}/edit', 'ProductController@edit')->name('edit');
        Route::post('/update/{product}', 'ProductController@update')->name('update');
        Route::get('/destroy/{product}', 'ProductController@destroy')->name('destroy');
        
    });

    Route::prefix('discounts')->name('discounts.')->group(function() {
        Route::get('/', 'DiscountCuponController@index')->name('index');
        Route::get('/create', 'DiscountCuponController@create')->name('create');
        Route::post('/discount', 'DiscountCuponController@discount')->name('discount');
        Route::get('{discount}/edit', 'DiscountCuponController@edit')->name('edit');
        Route::post('/update/{discount}', 'DiscountCuponController@update')->name('update');
        Route::get('/destroy/{discount}', 'DiscountCuponController@destroy')->name('destroy');
        
    });

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

