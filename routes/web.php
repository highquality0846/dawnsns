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


//ログイン中のページ
Route::get('/top','PostsController@index');
//ログアウト処理
Route::get('/logout','Auth\LoginController@logout');

Route::get('/profile','UsersController@profile');
Route::post('/profile','UsersController@profile');

Route::get('/search','UsersController@search');              //ユーザー検索ボタンでsearch.blade.phpへ
Route::post('/search','UsersController@search');             //user検索ボタンを押下する→UsersController@search

Route::get('/follow-list','followsController@followList');    //フォローリストへ
Route::get('/follower-list','followsController@followerList'); //フォロワーリストへ

Route::post('/tweet','PostsController@tweet');

Route::get('post/{id}/delete','PostsController@delete');      //delate処理
Route::post('post/{id}/update','PostsController@update');     //update処理      

Route::post('/add-follow','UsersController@follow');           //フォロー
Route::post('/delete','UsersController@delete');               //フォロー解除