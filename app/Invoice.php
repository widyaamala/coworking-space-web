<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'user_id','product_id','total', 'payment_method', 'note', 'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function invoicable()
    {
        return $this->morphTo();
    }
}
