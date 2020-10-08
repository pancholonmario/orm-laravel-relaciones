<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    // tiene muchos, relación de 1 a muchos: 1 nivel tiene muchos usuarios
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function posts()
    {
        return $this->hasManyThrough(Post::class, User::class);
    }

    public function videos()
    {
        return $this->hasManyThrough(Video::class, User::class);
    }

}

