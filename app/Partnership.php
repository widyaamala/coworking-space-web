<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    protected $fillable = [
        'user_id', 'company', 'partner_type', 'proposal'
    ];
}
