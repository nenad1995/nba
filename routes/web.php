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

Route::get('/register', ['as' => 'register', 'uses' => 'RegisterController@create']);
Route::post('/register', 'RegisterController@store');

Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@create']);
Route::post('/login', 'LoginController@store');
Route::get('/logout', ['as' => 'logout', 'uses' => 'LoginController@destroy']);


Route::get('/teams','TeamsController@index')->name('teams-index');
Route::get('/teams/{id}','TeamsController@show')->name('teams-show');
Route::get('/players/{id}','PlayersController@show')->name('players-show');

