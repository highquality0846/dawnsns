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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');

Route::get('/top','PostsController@index');
Route::get('/logout','Auth\LoginController@logout');

Route::get('/profile','ProfileController@profile');
Route::post('/update','ProfileController@update');
Route::get('post/{id}/profile','UsersController@profile');

Route::get('/search','UsersController@search');
Route::post('/search','UsersController@search');

Route::get('/follow-list','followsController@followList');
Route::get('/follower-list','followsController@followerList');

Route::post('/tweet','PostsController@tweet');

Route::get('post/{id}/delete','PostsController@delete');
Route::post('post/{id}/update','PostsController@update');

Route::post('/add-follow','UsersController@follow');
Route::post('/delete','UsersController@delete');