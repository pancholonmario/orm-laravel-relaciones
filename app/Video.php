<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
     // uno a uno:
     public function user()
     {
         return $this->belongsTo(User::class);
     }
 
     // uno a uno:
     public function category()
     {
         return $this->belongsTo(Category::class);
     }
 
     //VAMOS CON LOS MÉTODOS POLIMORFICOS:
 
     //uno a muchos:
     public function comments()
     {
         return $this->morphMany(Comment::class, 'commentable');
     }
 
     // uno a uno:
     public function image()
     {
         return $this->morphOne(Image::class, 'imageable');
     }
 
     // muchos a muchos:
     //1 video puede tener muchas etiquetas y 1 etiqueta puede tener muchos videos para ello me voy al modelo de etiquetas para representar que 1 etiqueta puede tener muchos videos
     public function tags()
     {
         return $this->morphToMany(Tag::class, 'taggable');
     }
}
