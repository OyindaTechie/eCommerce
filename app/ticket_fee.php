<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticket_fee extends Model
{
    //
    protected $fillable = [
        'source', 'destination', 'fees'
    ];

}
