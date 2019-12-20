<?php

$factory->define(\App\Models\Tags\GroupTag::class, function(\Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'reference' => $faker->word,
        'tag_category_id' => function() {
            return factory(\App\Models\Tags\GroupTagCategory::class)->create()->id;
        }
    ];
});

$factory->define(\App\Models\Tags\RoleTag::class, function(\Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'reference' => $faker->word,
        'tag_category_id' => function() {
            return factory(\App\Models\Tags\RoleTagCategory::class)->create()->id;
        }
    ];
});

$factory->define(\App\Models\Tags\PositionTag::class, function(\Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'reference' => $faker->word,
        'tag_category_id' => function() {
            return factory(\App\Models\Tags\PositionTagCategory::class)->create()->id;
        }
    ];
});

$factory->define(\App\Models\Tags\UserTag::class, function(\Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'reference' => $faker->word,
        'tag_category_id' => function() {
            return factory(\App\Models\Tags\UserTagCategory::class)->create()->id;
        }
    ];
});
