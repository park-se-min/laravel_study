<?php

Route::get('test/register', [
    'as' => 'test.create',
	'uses' => 'TestPHPCode@create',
]);

Route::get('/', 'WelcomeController@index');
Route::get('/home', 'WelcomeController@index');

Route::get('articles', [
    'as' => 'articles.index',
	'uses' => 'ArticlesController@index',
]);

Route::get('articles/create', [
    'as' => 'articles.create',
	'uses' => 'ArticlesController@create',
]);


Route::get('articles/show/{article}', [
    'as' => 'articles.show',
	'uses' => 'ArticlesController@show',
]);

Route::get('articles/edit/{article}', [
    'as' => 'articles.edit',
	'uses' => 'ArticlesController@edit',
]);


Route::post('articles/store', [
    'as' => 'articles.store',
	'uses' => 'ArticlesController@store',
]);


Route::put('articles/update/{article}', [
    'as' => 'articles.update',
	'uses' => 'ArticlesController@update',
]);


Route::get('articles/delete2/{article}', [
    'as' => 'articles.delete2',
	'uses' => 'ArticlesController@destroy2',
]);

Route::delete('articles/{article}', [
    'as' => 'articles.delete',
	'uses' => 'ArticlesController@destroy',
]);

/* 사용자 등록 */
Route::get('auth/register', [
    'as' => 'users.create',
	'uses' => 'UsersController@create',
]);

Route::post('auth/register', [
    'as' => 'users.store',
    'uses' => 'UsersController@store',
]);



Route::get('auth/confirm/{code}', [
    'as' => 'users.confirm',
	'uses' => 'UsersController@confirm',
]);



/* 사용자 인증 */
Route::get('auth/login', [
    'as' => 'sessions.create',
    'uses' => 'SessionsController@create',
]);

Route::post('auth/login', [
    'as' => 'sessions.store',
    'uses' => 'SessionsController@store',
]);

Route::post('auth/logout', [
    'as' => 'sessions.destroy',
    'uses' => 'SessionsController@destroy',
]);

/* 비밀번호 초기화 */
Route::get('auth/remind', [
    'as' => 'remind.create',
    'uses' => 'PasswordsController@getRemind',
]);

Route::post('auth/remind', [
    'as' => 'remind.store',
    'uses' => 'PasswordsController@postRemind',
]);

Route::get('auth/reset/{token}', [
    'as' => 'reset.create',
    'uses' => 'PasswordsController@getReset',
]);
// ])->where('token', '[\pL-\pN]{64}');

Route::post('auth/reset', [
    'as' => 'reset.store',
    'uses' => 'PasswordsController@postReset',
]);

Route::get('social/{provider}', [
    'as' => 'social.login',
    'uses' => 'SocialController@execute',
]);
