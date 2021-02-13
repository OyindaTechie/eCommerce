<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class verify_ticket extends Model
{
    //
    protected $fillable = [
       'ticket_id', 'transaction_id', 'amount_paid'
    ];
}
