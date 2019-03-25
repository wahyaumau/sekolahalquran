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

Route::get('blog/{slug}', 'BlogController@show')->name('blog.show');
Route::resource('posts', 'PostController');
Route::resource('categories', 'CategoryController',[
	'except' => ['show']
]);
Route::resource('tags', 'TagController', [
	'except' => ['show']
]);
Route::get('/home', 'HomeController@index')->name('home');
