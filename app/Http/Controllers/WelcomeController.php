<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class WelcomeController extends Controller
{
	public function index()
	{
		flash('환영');

		$items = ['as', 'bbb', 'ccc'];

		return view('welcome2')->with([
			'as1df'=>'aaaa',
			'items'=>$items,
			'itemCount'=>count($items),
		]);
	}


	public function login()
	{
		if (Auth::attempt(['email' => 'mail@test.com', 'password' => '1234']))
		{
			return redirect('protected');
		}
	}

	public function protected()
	{
		dump(session()->all());

		// if (! auth()->check()) {
		// 	return '누구?';
		// }

		return '어서오삼'. auth()->user()->name;
	}

	public function logout()
	{
		auth()->logout();

		return redirect('home');
	}
}
