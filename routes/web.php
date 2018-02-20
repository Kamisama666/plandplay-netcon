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
Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::middleware(['auth'])->group(function() {

  Route::get('/game_signup', 'GamesController@create')->name('game_post');
  Route::post('/game_signup', 'GamesController@store')->name('game_store');
  Route::get('/game_signup/success', 'GamesController@success')->name('game_success');

  Route::get('storage/{filename}', 'GamesController@showImage')->name('storage_get');
});