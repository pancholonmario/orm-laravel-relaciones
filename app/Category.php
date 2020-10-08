<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // 1 categoria tiene muchos posts:
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // 1 categoria tiene muchos videos:
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
