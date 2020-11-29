<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','description','category','type','price'
    ];

    public function invoice()
    {
        return $this->hasMany('App\Invoice');
    }

}
