<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = [
        'user_id', 'start_date', 'end_date'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function invoice()
    {
        return $this->morphOne('App\Invoice', 'invoicable');
    }

}
