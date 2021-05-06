<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
class Registration extends Model
{
    
    use HasApiTokens, Notifiable;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'username',
        'password'
    ];
}
