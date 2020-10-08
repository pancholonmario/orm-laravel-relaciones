<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 1 usuario tenga 1 perfil: relación de 1 a 1:

    public function Profile()
    {
        return $this->hasOne(Profile::class);
    }

    // 1 usuario pertenece a 1 nivel:

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    //relacion de muchos a muchos
    //1 usuario tiene muchos grupos
    public function groups()
    {
        return $this->belongsToMany(Group::class)->withTimestamps();
    }

    //relación 1 a 1 pero colocando a través de:
    public function location()
    {
        return $this->hasOneThrough(Location::class, Profile::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
