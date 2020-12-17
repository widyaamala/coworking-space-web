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

}
