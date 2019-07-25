<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('test/test1')->with('name', 'Foo');
//     // return view('errors/503');
// });

Route::get('/home', 'WelcomeController@index');

Route::get('/home1', function () {
	return 'home1';
});

Route::get('/home2', function () {
	return 'home2';
});

Route::get('/articles', 'ArticlesController@index');

Route::get('/', function () {
	$items = ['as', 'bbb', 'ccc'];

    return view('welcome2')->with([
		'as1df'=>'aaaa',
		'items'=>$items,
		'itemCount'=>count($items),
	]);
});


/* ★ 로그인 ★ */
Route::get('/', 'WelcomeController@index');

Route::get('/aa', 'WelcomeController@index2');

Route::get('/auth/login', function () {
	$credentials = [
		'email' => 'mail@test.com',
		'password' => '1234'
	];

	if (! auth()->attempt($credentials)) {
		return "로그인 정보가 정확하지 않습니다";
	}
	return redirect('protected');
});

Route::get('protected', function () {
	dump(session()->all());

	if (! auth()->check()) {
		return '누구?';
	}

	return '어서오삼'. auth()->user()->name;
});


Route::get('auth/logout', function () {
	auth()->logout();

	return "또보삼~";
});