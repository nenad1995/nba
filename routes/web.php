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

Route::group(['middleware' => ['guest']],function(){
    Route::get('/register',['as'=> 'show-register', 'uses' => 'RegisterController@create']);
    Route::post('/register','RegisterController@store')->name('register');
    Route::get('/login','LoginController@create')->name('show-login');
    Route::post('/login','LoginController@store')->name('login');
});

Route::group(['middleware' => ['auth']],function(){
    Route::get('/teams','TeamsController@index')->name('teams-index');
    Route::get('/teams/{id}','TeamsController@show')->name('teams-show');
    Route::get('/players/{id}','PlayerController@show')->name('players-show');
});

Route::get('/logout','LoginController@logout')->name('logout');
Route::get('/verification/{id}', ['as' => 'verification', 'uses' => 'LoginController@verification']);

Route::get('/team/news/{id}','TeamNewsController@index')->name('tags-posts');
Route::post('/teams/{team_id}/comments', ['as' => 'team-comments', 'uses' => 'CommentsController@store']);

Route::get('/news','NewsController@index')->name('news-index');
Route::get('/news/{id}','NewsController@show')->name('news-show');
