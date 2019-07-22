<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
