<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $fillable = [
		'user_id', 'invoice_id', 'room_id', 'date', 'event_name', 'duration', 'room_name', 'total_seats', 'total_snacks', 'snack_choices', 'layout_seat', 'note', 'status'
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
