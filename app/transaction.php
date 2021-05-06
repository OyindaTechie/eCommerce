<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Transaction extends Model
{
    //
    use HasApiTokens, Notifiable;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'username',
        'device_bought',
        'device_count',
        'device_total_cost',
        'status',
        'purchase_date',
        'returned_date'
    ];
}
