<?php

use Faker\Generator as Faker;

$factory->define(sysbar\Empresa::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'logo' => $faker->sentence
    ];
});
