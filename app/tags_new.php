<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tags_new extends Model
{
	protected $fillable = [
        'name', 'slug',
    ];
	public function articles()
	{
		return $this->belongsToMany(article::class);
	}
}
