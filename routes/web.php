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

Route::get('/', function () {
    return view('welcome');
})->middleware("auth");

    Route::prefix('products')->group(function () {

        Route::get('','ProductController@index')->name('product.index')->middleware("auth");
        Route::get('create','ProductController@create')->name('product.create')->middleware("auth");
        Route::post('store','ProductController@store')->name('product.store')->middleware("auth");
        Route::get('edit/{product}', 'ProductController@edit')->name('product.edit')->middleware("auth");
        Route::post('update/{product}','ProductController@update')->name('product.update')->middleware("auth");
        Route::post('delete/{product}','ProductController@destroy')->name('product.destroy')->middleware("auth");
        Route::get('show/{product}','ProductController@show')->name('product.show')->middleware("auth");
        Route::get('/pdf', 'ProductController@generatePDF')->name('product.pdf');
        Route::get('pdfProduct/{product}', 'ProductController@generateProductPDF')->name('product.pdfproduct');
        Route::get('generateStatistics','ProductController@generateStatisticsPDF')->name('product.generatestatistics');
        });

    Route::prefix('categories')->group(function () {

        Route::get('','CategoryController@index')->name('category.index')->middleware("auth");
        Route::get('create','CategoryController@create')->name('category.create')->middleware("auth");
        Route::post('store','CategoryController@store')->name('category.store')->middleware("auth");
        Route::get('edit/{category}', 'CategoryController@edit')->name('category.edit')->middleware("auth");
        Route::post('update/{category}','CategoryController@update')->name('category.update')->middleware("auth");
        Route::post('delete/{category}','CategoryController@destroy')->name('category.destroy')->middleware("auth");
        Route::get('show/{category}','CategoryController@show')->name('category.show')->middleware("auth");
        Route::get('/pdf', 'CategoryController@generatePDF')->name('category.pdf');
        Route::get('pdfCategory/{category}', 'CategoryController@generateCategoryPDF')->name('category.pdfcategory');
        });

    Route::prefix('shops')->group(function () {

        Route::get('','ShopController@index')->name('shop.index')->middleware("auth");
        Route::get('create','ShopController@create')->name('shop.create')->middleware("auth");
        Route::post('store','ShopController@store')->name('shop.store')->middleware("auth");
        Route::get('edit/{shop}', 'ShopController@edit')->name('shop.edit')->middleware("auth");
        Route::post('update/{shop}','ShopController@update')->name('shop.update')->middleware("auth");
        Route::post('delete/{shop}','ShopController@destroy')->name('shop.destroy')->middleware("auth");
        Route::get('show/{shop}','ShopController@show')->name('shop.show')->middleware("auth");
        Route::get('/pdf', 'ShopController@generatePDF')->name('shop.pdf');
        Route::get('pdfShop/{shop}', 'ShopController@generateShopPDF')->name('shop.pdfshop');
        });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
