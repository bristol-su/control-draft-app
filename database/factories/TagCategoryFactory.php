<?php

$factory->define(\App\Models\Tags\GroupTagCategory::class, function(\Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'reference' => $faker->word,
        'type' => 'group'
    ];
});

$factory->define(\App\Models\Tags\UserTagCategory::class, function(\Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'reference' => $faker->word,
        'type' => 'user'
    ];
});

$factory->define(\App\Models\Tags\RoleTagCategory::class, function(\Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'reference' => $faker->word,
        'type' => 'role'
    ];
});

$factory->define(\App\Models\Tags\PositionTagCategory::class, function(\Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'reference' => $faker->word,
        'type' => 'position'
    ];
});
