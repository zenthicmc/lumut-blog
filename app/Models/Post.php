<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    public $timestamps = false;
    
    protected $fillable = [
        'idpost',
        'title',
        'content',
        'date',
        'username',
    ];
}
