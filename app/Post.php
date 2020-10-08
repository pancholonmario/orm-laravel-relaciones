<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // 1 post pertenece a 1 usuario:
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 1 post pertenece a 1 categoria:
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //VAMOS CON LOS MÉTODOS POLIMORFICOS:

    //1 post puede tener muchos comentarios (en vez de hasMany):
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    // 1 post puede tener 1 imagen:
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    // muchos posts pueden tener muchas etiquetas:
    
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
