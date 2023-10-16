<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newPost extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(newUser::class, 'user_id', 'id');
    }
}