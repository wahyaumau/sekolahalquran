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

Route::get('/', 'PageController@index');
Route::get('/profile', 'PageController@profile');
Route::prefix('blogs')->group(function(){
	Route::get('/{slug}', 'BlogController@show')->name('blogs.show');	
	Route::get('/category/{category}', 'BlogController@blogByCategory')->name('blogs.category');	
	Route::get('/tag/{tag}', 'BlogController@blogByTag')->name('blogs.tag');	
	Route::get('/', 'BlogController@index')->name('blogs.index');
});


Auth::routes();


Route::resource('posts', 'PostController');

Route::prefix('comments')->group(function(){
	Route::post('/{post}/store', 'CommentController@store')->name('comments.store');
	Route::delete('/{comment}/delete', 'CommentController@destroy')->name('comments.destroy');
});
Route::resource('categories', 'CategoryController',[
	'except' => ['show']
]);
Route::resource('tags', 'TagController', [
	'except' => ['show']
]);
Route::get('/home', 'HomeController@index')->name('home');
