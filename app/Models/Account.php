<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'account';
    public $timestamps = false;
    
    protected $fillable = [
        'username',
        'password',
        'name',
        'role',
    ];
}
