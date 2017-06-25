<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Event::listen('illuminate.query', function($query)
{
    //var_dump($query);
    //flash($query);
});

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('user/password', 'UserController@getPassword');
Route::post('user/password', 'UserController@postPassword');

Route::get('sql', 'SqlController@getQuery');
Route::post('sql', 'SqlController@getQuery');


Route::get('profiles/search',['uses' => 'ProfileController@getSimpleSearch','as' => 'search']);
Route::get('profiles/advancedsearch',['uses' => 'ProfileController@getAdvancedSearch','as' => 'search']);
Route::resource('profiles','ProfileController');

Route::resource('profiles.posts', 'PostController');

Route::resource('posts','PostController');

Route::controller('dba', 'DBAdminController');


Route::get('/', 'PagesController@home');
Route::get('/admin', 'PagesController@admin');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::get('/search', 'PagesController@search');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('admin');;
