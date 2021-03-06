<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $with = ['user'];

	//
	protected $fillable = ['title', 'content'];

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function tag()
	{
		return $this->belongsToMany(tag::class);
	}

	public function attachments()
	{
		return $this->hasMany(Attachment::Class);
	}
}
