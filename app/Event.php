<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $fillable = [
		'user_id', 'room_id', 'room_name', 'date', 'time', 'duration', 'event_name', 'description', 'event_type',   'total_seats', 'total_snacks', 'snack_choices', 'layout_seat', 'facilities', 'image', 'status'
	];
	
	public function setSnackAttribute($value)
    {
        $this->attributes['snack_choices'] = json_encode($value);
    }

    public function getSnackAttribute($value)
    {
        return $this->attributes['snack_choices'] = json_decode($value);
    }
}
