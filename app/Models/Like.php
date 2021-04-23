<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $casts = [
        'liked' => 'bool',
    ];

    protected $guarded = [];
}
