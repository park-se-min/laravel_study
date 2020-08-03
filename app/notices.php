<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notices extends Model
{
	// public $timestamps = false;
	protected $fillable = ['notice_id', 'title', 'content'];

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}
}
