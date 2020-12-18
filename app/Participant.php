<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = ['user_id', 'event_starter_id'];


  	public function user()
  	{
  	    return $this->belongsTo('App\Models\User');
  	}

  	public function eventStarter()
  	{
  	    return $this->belongsTo('App\EventStarter');
  	}

}
