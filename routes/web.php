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

Auth::routes();

Route::get('/', 'HomeController@base');
Route::get('/home', 'HomeController@index')->middleware(['completed_registration', 'timezoned'])->name('home');

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::middleware(['auth', 'timezoned'])->group(function() {
  Route::get('/post-login/new', 'Auth\PostLoginController@create')->name('post_login_post');
  Route::post('/post-login', 'Auth\PostLoginController@store')->name('post_login_store');
});

Route::middleware(['auth', 'completed_registration', 'timezoned'])->group(function() {
  Route::get('/games/new', 'GamesController@create')->name('game_post');
  Route::post('/games', 'GamesController@store')->name('game_store');
  Route::get('/games/success', 'GamesController@success')->name('game_success');
});

Route::get('/games', 'GamesController@index')->name('game_list');
Route::get('/games/{game}', 'GamesController@show')->name('game_view');
Route::get('/games/{game}/register', 'GamesController@register')->name('game_register');
Route::get('/games/{game}/unregister', 'GamesController@unregister')->name('game_unregister');
Route::get('/storage/{filename}', 'GamesController@showImage')->name('storage_get');