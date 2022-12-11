<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function showroom()
    {
        return $this->hasMany('App\Showroom', 'user_id', 'id');
    }
}
