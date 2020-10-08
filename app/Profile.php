<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //Aqui hubiera colocado un metodo de relación con el usuario pero no quiero que desde el Perfil tengamos acceso a 1 usuario por eso no le coloco el método de la relación

    //ahora vamos a colocar la relación de 1 a 1 con Localización:
    public function location()
    {
        return $this->hasOne(Location::class);
    }

}
