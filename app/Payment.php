<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id', 'invoice_id', 'image', 'from_bank', 'acc_name', 'acc_number', 'to_bank', 'total', 'date', 'status'
    ];
}
