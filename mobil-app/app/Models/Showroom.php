<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent;

class Showroom extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
