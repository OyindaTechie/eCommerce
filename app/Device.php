<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Device extends Model
{
        
    use HasApiTokens, Notifiable;
    protected $fillable = [
        'device_id',
        'device_name',
        'device_cost'
    ];
}
