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

Route::get('/', 'ProductSeeController@indexWelcome');

Route::get('/products', 'ProductSeeController@index');
Route::get('/products/{product}/view', 'ProductSeeController@view');

Route::view('/about', 'about');
Route::view('/shopping-cart', 'shoppingCart');



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
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

