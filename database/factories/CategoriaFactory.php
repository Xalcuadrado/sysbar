<?php

use Faker\Generator as Faker;

$factory->define(sysbar\Categoria::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'descripcion' => $faker->sentence
    ];
});
