<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $fillable = [
		'user_id', 'organizer', 'date', 'start_time','end_time', 'event_name', 'description', 'rundown',  'event_type', 'event_category','ticket_price', 'total_seats', 'total_snacks', 'snack_choices', 'facilities', 'layout_seat', 'note', 'image', 'status'
	];

	public function user()
	{
	    return $this->belongsTo('App\Models\User');
	}

	public function invoice()
	{
	    return $this->morphOne('App\Invoice', 'invoicable');
	}

	public function setSnackAttribute($value)
  {
      $this->attributes['snack_choices'] = json_encode($value);
  }

  public function getSnackAttribute($value)
  {
      return $this->attributes['snack_choices'] = json_decode($value);
  }
  
  public function setFacilitiesAttribute($value)
  {
      $this->attributes['facilities'] = json_encode($value);
  }

  public function getFacilitiesAttribute($value)
  {
      return $this->attributes['facilities'] = json_decode($value);
  }
}
