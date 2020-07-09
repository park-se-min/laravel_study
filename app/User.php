<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;

	protected $fillable = [
		'name',
		'email',
		'password',
		'confirm_code',
		'activated',
	];

	protected $hidden = [
		'password',
		'remember_token',
		'confirm_code',
	];

	protected $casts = [
		'activated' => 'boolean',
	];

	protected $dates = ['last_login'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	public function articles()
	{
		return $this->hasMany(Article::class, 'user_id');
	}

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


	public function index()
	{
		if (Auth::attempt(['email' => 'mail@test.com', 'password' => '1234']))
		{
			return redirect('protected');
		}
	}

	public function isAdmin()
	{
		return ($this->id === 1) ? true : false;
	}
}
