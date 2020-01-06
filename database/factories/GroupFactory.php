<?php

$factory->define(\App\Models\Group::class, function(\Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->company,
        'email' => $faker->unique()->email
    ];
});
