<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest');
	}

	public function create()
	{
		return view('users.create');
	}

	public function store(Request $request)
	{
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
		]);

		$confirmCode = str_random(60);

        $user = \App\User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'confirm_code' => $confirmCode,
		]);

		event(new \App\Events\UserCreated($user));

		// \Mail::send('emails.auth.confirm', compact('user'), function ($message) use ($user) {
		// 	$message->to($user->email);
		// 	$message->subject(
		// 		sprintf('[%s] 회원확인', config('app.name'))
		// 	);
		// });

		// auth()->login($user);
		// flash('메일확인!!');

		return $this->respondCreated('메일확인!!');
	}

	protected function respondCreated($message)
	{
		flash($message);

		return redirect('/');
	}

	public function confirm($code)
	{
		// dd($code);
		$user = \App\User::whereConfirmCode($code)->first();

		if (! $user) {
			flash('URl 정확하게');

			return redirect('/');
		}

		$user->activated = 1;
		$user->confirm_code = null;
		$user->save();

		auth()->login($user);
		flash(auth()->user()->name."환영!!!");

		return redirect('home');
	}
}
