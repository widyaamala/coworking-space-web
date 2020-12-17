<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
		'user_id', 'event_starter_id', 'parent_id', 'comment'
	];
	
	 public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
	
	public function replies()
    {
        return $this->hasMany('App\Comment', 'parent_id');
    }
}
