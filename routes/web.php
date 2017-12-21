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
// Auth::routes();

Route::get('login', 'AuthController@showLogin');
Route::post('login', 'AuthController@login')->name('login');
Route::get('register', 'AuthController@showRegister');
Route::post('register', 'AuthController@register')->name('register');
Route::post('logout', 'AuthController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function() {

	Route::get('/articles', 'ArticlesController@index');
	Route::get('/articles/create', 'ArticlesController@create');
	Route::get('/articles/{article}', 'ArticlesController@show');
	Route::post('/articles', 'ArticlesController@store');
	Route::get('/articles/{article}/edit', 'ArticlesController@edit');
	Route::put('/articles/{article}', 'ArticlesController@update');
	Route::delete('/articles/{article}', 'ArticlesController@destroy');

	Route::get('/categories', 'CategoriesController@index');
	Route::get('/categories/create', 'CategoriesController@create');
	Route::get('/categories/{category}', 'CategoriesController@show');
	Route::post('/categories', 'CategoriesController@store');
	Route::get('/categories/{category}/edit', 'CategoriesController@edit');
	Route::put('/categories/{category}', 'CategoriesController@update');
	Route::delete('/categories/{category}', 'CategoriesController@destroy');
	Route::get('/categories/{category}/articles', 'CategoriesController@categoryArticles');

	Route::post('/articles/{article}/comments','CommentsController@store');

});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
