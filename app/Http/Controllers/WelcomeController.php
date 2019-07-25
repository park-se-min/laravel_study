<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class WelcomeController extends Controller
{
	public function index()
	{
		$items = ['as', 'bbb', 'ccc'];

		return view('welcome2')->with([
			'as1df'=>'aaaa',
			'items'=>$items,
			'itemCount'=>count($items),
		]);
	}

	
	public function index2()
	{
		if (Auth::attempt(['email' => 'mail@test.com', 'password' => '1234']))
		{
			return redirect('protected');
		}
	}
}
