<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(sysbar\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'apellido' => $faker->sentence,
        'email' => $faker->unique()->safeEmail,
        't_documento' => 'rut',
        'n_documento' => '123543667-4',
        'telefono' => '9 9999 9999',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
