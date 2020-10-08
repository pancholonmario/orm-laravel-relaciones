<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // 1 a muchos con polimorfismo: usaremos con usuarios, videos y posts
    public function imageable()
    {
        return $this->morphTo();
    }
}
