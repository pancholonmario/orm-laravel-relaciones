<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //1 tiqueta tiene muchos Posts:
    // es para la tabla de muchos a muchos utilizamos: morphByMany o trabsformado para muchos
    public function posts()
    {
        return $this->morphByMany(Post::class, 'postable');
    }

    //1 tiqueta puede tener muchos videos:
    public function videos()
    {
        return $this->morphByMany(Video::class, 'videoable');
    }
}
