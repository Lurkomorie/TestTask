<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RandomNumber extends Model
{
    protected $fillable = [
        'number', 'result', 'win', 'user_id',
    ];
}
