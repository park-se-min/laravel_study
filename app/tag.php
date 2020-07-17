<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
	protected $table = 'tag';
	protected $fillable = [
        'name', 'slug',
    ];
	public function articles()
	{
		return $this->belongsToMany(article::class);
	}
}
