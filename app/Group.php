<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
      //relacion de muchos a muchos
    //1 grupo tiene muchos usuarios
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
