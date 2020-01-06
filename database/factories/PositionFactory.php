<?php

$factory->define(\App\Models\Position::class, function(\Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->company,
        'description' => $faker->paragraph
    ];
});
