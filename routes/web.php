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


// 메인 페이지
Route::get('/', 'WelcomeController@index');

// 로그인
Route::get('/login', 'WelcomeController@login');

// 로그인 처리완료 페이지
Route::get('/protected', 'WelcomeController@protected');
Route::get('/protected2', ['middleware'=>'auth', function(){
	dump(session()->all());

	//// 에러가 나야되는데...
	// if (! auth()->check()) {
	// 	return '누구?';
	// }

	return '어서오삼'. auth()->user()->name;
}]);

// 로그아웃
Route::get('/logout', 'WelcomeController@logout'); 

Auth::routes();

Route::get('/home', 'HomeController@index');
