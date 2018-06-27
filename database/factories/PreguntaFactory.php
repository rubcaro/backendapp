<?php

use Faker\Generator as Faker;

$factory->define(App\Pregunta::class, function (Faker $faker) {
    return [
        'pregunta' => $faker->sentence(8, true),
    ];
});

$factory->define(App\Alternativa::class, function (Faker $faker) {
    return [
        'alternativa' => $faker->sentence(4, true),
    ];
});