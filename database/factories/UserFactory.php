<?php

$factory->define(\App\Models\User::class, function(\Faker\Generator $faker) {
    return [
        'forename' => $faker->firstName,
        'surname' => $faker->lastName,
        'email' => $faker->email
    ];
});
