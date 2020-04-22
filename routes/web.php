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

Route::get('/test', 'TestPHPCode@index');

Route::get('/', 'WelcomeController@index');

Route::get('/home', 'WelcomeController@index');

// Route::get('/home1', function () {
// 	return 'home1';
// });

// Route::get('/home2', function () {
// 	return 'home2';
// });

Route::get('/articles', 'ArticlesController@index');
// Route::get('/articles/{id}', 'ArticlesController@show');

// Route::get('/', function () {
// 	$items = ['as', 'bbb', 'ccc'];

//     return view('welcome2')->with([
// 		'as1df'=>'aaaa',
// 		'items'=>$items,
// 		'itemCount'=>count($items),
// 	]);
// });


// // 메인 페이지
// Route::get('/', 'WelcomeController@index');

// // 로그인
// Route::get('/login', 'WelcomeController@login');

// // 로그인 처리완료 페이지
// Route::get('/protected', 'WelcomeController@protected');
// Route::get('/protected2', ['middleware'=>'auth', function(){
// 	dump(session()->all());

// 	//// 에러가 나야되는데...
// 	// if (! auth()->check()) {
// 	// 	return '누구?';
// 	// }

// 	return '어서오삼'. auth()->user()->name;
// }]);

// // 로그아웃
// Route::get('/logout', 'WelcomeController@logout');

// // Auth::routes();

// Route::get('/home', 'HomeController@index');


// // DB::listen(function($query){
// // 	var_dump($query->sql);
// // 	echo "<br>";
// // });
// /*
// Event::listen('article.created', function($article) {
// 	var_dump('받았음');
// 	echo '<br>';
// 	var_dump($article->toArray());
// 	echo '<br>';
// });
//  */
// Route::resource('articles', 'ArticlesController');

// Route::get('mail', function () {
// 	 $article = App\Article::with('user')->find(1);

// 	 return Mail::send(
// 		'emails.articles.created',
// 		compact('article'),
// 		function ($message) use ($article) {
// 			$message->to('pseeq@naver.com');
// 			$message->subject('Subject'. $article->title);
// 	 });
// });


// Route::get('markdown', function () {
// $text = <<<EOT
// # 마크다운 예제 1

// 이문서는 [마크다운][1] 으로 썼습니다. 화면 어저구 출력됩니다

// ## 순서없는 목록

// - 첫번째 항목
// - 두번째 항목[^2]

// [1]: http://naver.com

// [^2]: 두번째 항목_ http://daum.net

// EOT;

// 	return app(ParsedownExtra::class)->text($text);
// });

// // Route::get('docs/{file?}', function ($file = null) {
// // 	$text = (new App\Documentation)->get($file);

// // 	return app(ParsedownExtra::class)->text($text);
// // });


// Route::get('docs/{file?}', 'DocsController@show');

// Route::get('docs/images/{image}', 'DocsController@image')
// 	->where('image', '[\pL-\pN\._-]+-img-[0-9]{2}.png');


/*
	--------------------------- 실전 프로젝트 ---------------------------
*/


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

// // ])->where('code', '[\pL-\pN]{60}'); < 이부분에서 에러나서 패스!
// Route::get('auth/confirm/{code}', [
//     'as' => 'users.confirm',
//     'uses' => 'UsersController@confirm',
// ])->where('code', '[\pL-\pN]{60}');


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
