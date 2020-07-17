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

	public function stroe(Request $request)
	{
		$socialUser = \App\User::whereEmail($request->input('email'))->whereNull('password')->first();

		if ($socialUser) {
			return $this->updateSocialAccount($request, $socialUser);
		}

		return $this->createNativeAccount($request);
	}

    protected function updateSocialAccount(Request $request, \App\User $user)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:6',
        ]);

        $user->update([
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
		]);

		auth()->login($user);

		return $this->respondCreated($user->name . '환영환영');

        // return $this->respondUpdated($user);
    }

    /**
     * A user tries to register a native account for the first time.
     * S/he has not logged into this service before with a social account.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    protected function createNativeAccount(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $confirmCode = str_random(60);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'confirm_code' => $confirmCode,
        ]);

        event(new \App\Events\UserCreated($user));

        return $this->respondConfirmationEmailSent();
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
