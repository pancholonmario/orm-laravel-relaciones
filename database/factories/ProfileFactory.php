<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        //userName que coloque nombres de usuarios aleatorios
        'instagram' => $faker->userName,
        'github' => $faker->userName,
        // url: obtengo páginas falsas
        'web' => $faker->url,
    ];
});
