<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest', ['except'=>'destroy']);
	}

	public function create()
	{
		return view('sessions.create');
	}


	public function store(Request $request)
	{
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
		]);

		if (! auth()->attempt($request->only('email', 'password'), $request->has('remember')) )
		{
			// flash('이메일 또는 비번이 안맞음');

			// return back()->withInput();

			return $this->respondError('이메일 또는 비번이 안맞음');
		}

		if (! auth()->user()->activated)
		{
			auth()->logout();

			return $this->respondError('가입 확인좀');
		}

		flash(auth()->user()->name ."님 환영 로그인");

		return redirect()->intended('home');
	}

	protected function respondError ($message)
	{
		flash()->error($message);

		return back()->withInput();
	}


	public function destroy()
	{
		auth()->logout();
		flash('또오삼');

		return redirect('/');
	}
}
