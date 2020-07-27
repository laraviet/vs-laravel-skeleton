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

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::resource('product-categories', 'ProductCategoryController');
    Route::resource('brands', 'BrandController');
    Route::resource('product-tags', 'ProductTagController');
    Route::resource('products', 'ProductController');
});
