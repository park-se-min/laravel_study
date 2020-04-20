<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordsController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest');
	}

	public function getRemind()
	{
		return view('passwords.remind');
	}

	public function postRemind(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email|exists:users'
		]);

		$email = $request->get('email');
		$token = str_random(64);

		\DB::table('password_resets')->insert([
			'email'      => $email,
			'token'      => $token,
			'created_at' => \Carbon\Carbon::now()->toDateTimeString()
		]);

		\Mail::send('emails.passwords.reset', compact('token'), function($message) use ($email) {
			$message->to($email);
			$message->subject(
				sprintf('[%s] 비밀번호 초기화', config('app.name'))
			);
		});

		flash('발송함 확인좀');

		return redirect('/');
	}

    public function getReset($token = null)
    {
        return view('passwords.reset', compact('token'));
	}

    public function postReset(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users',
            'password' => 'required|confirmed',
            'token' => 'required'
        ]);

        $token = $request->get('token');

        if (! \DB::table('password_resets')->whereToken($token)->first()) {
            return $this->respondError(
                trans('auth.passwords.error_wrong_url')
            );
        }

        \App\User::whereEmail($request->input('email'))->first()->update([
            'password' => bcrypt($request->input('password'))
        ]);
        \DB::table('password_resets')->whereToken($token)->delete();

        return $this->respondSuccess(
            trans('auth.passwords.success_reset')
        );
	}

    /**
     * Make an error response.
     *
     * @param     $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function respondError($message)
    {
        flash()->error($message);

        return back()->withInput(\Request::only('email'));
    }

    /**
     * Make a success response.
     *
     * @param $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function respondSuccess($message)
    {
        flash($message);

        return redirect('/');
    }
}
