<?php

$factory->define(\App\Models\Group::class, function(\Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'email' => $faker->unique()->email
    ];
});
