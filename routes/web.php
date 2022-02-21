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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('products', ['as' => 'products', 'uses' => 'App\Http\Controllers\ProductsController@index']);
	Route::get('products/create', ['as' => 'products.create', 'uses' => 'App\Http\Controllers\ProductsController@create']);
	Route::put('products/edit', ['as' => 'product.edit', 'uses' => 'App\Http\Controllers\ProductsController@update']);
	Route::put('products', ['as' => 'product.add', 'uses' => 'App\Http\Controllers\ProductsController@add']);
});

Route::get('edit/product/{id}','App\Http\Controllers\ProductsController@editById')->middleware('auth');
Route::delete('/product/{id}','App\Http\Controllers\ProductsController@destroy')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('tags', ['as' => 'tags', 'uses' => 'App\Http\Controllers\TagController@index']);
	Route::get('tags/create', ['as' => 'tag.create', 'uses' => 'App\Http\Controllers\TagController@create']);
	Route::put('tags/edit', ['as' => 'tag.edit', 'uses' => 'App\Http\Controllers\TagController@update']);
	Route::put('tag', ['as' => 'tag.add', 'uses' => 'App\Http\Controllers\TagController@add']);
});
Route::get('edit/tag/{id}','App\Http\Controllers\TagController@editById')->middleware('auth');
Route::delete('/tag/{id}','App\Http\Controllers\TagController@destroy')->middleware('auth');


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::get('profile/create', ['as' => 'profile.create', 'uses' => 'App\Http\Controllers\ProfileController@create']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('add/profile', ['as' => 'profile.add', 'uses' => 'App\Http\Controllers\ProfileController@add']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::get('edit/profile/{id}','App\Http\Controllers\ProfileController@editById')->middleware('auth');

