<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    //
    protected $fillable = [
        'transaction_id','source', 'destination', 'fees', 'amount_paid', 'phone_number'
    ];
}
