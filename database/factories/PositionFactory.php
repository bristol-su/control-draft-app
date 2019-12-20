<?php

$factory->define(\App\Models\Position::class, function(\Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->paragraph
    ];
});
