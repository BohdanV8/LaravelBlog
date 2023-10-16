<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newUser extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->hasMany(newPost::class, 'user_id', 'id');
    }
}