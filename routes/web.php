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


Route::get('/', function () {
	$items = ['as', 'bbb', 'ccc'];

    return view('welcome')->with([
		'asdf'=>'aaaa',
		'items'=>$items,
		'itemCount'=>count($items),
	]);
});


