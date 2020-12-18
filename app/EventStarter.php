<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventStarter extends Model
{
    protected $fillable = [
		'user_id', 'organizer', 'schedule_plan', 'event_name', 'description', 'rundown',  'event_type', 'event_category','min_participant', 'image', 'status'
	];

	public function user()
	{
	    return $this->belongsTo('App\Models\User');
	}

	public function comments()
  {
      return $this->hasMany('App\Comment')->whereNull('parent_id');
  }

  public function participants()
  {
      return $this->hasMany('App\Participant');
  }
}
