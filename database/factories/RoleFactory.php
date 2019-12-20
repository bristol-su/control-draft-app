<?php

$factory->define(\App\Models\Role::class, function(\Faker\Generator $faker) {
    return [
        'position_id' => function() {
            return factory(\App\Models\Position::class)->create()->id;
        },
        'group_id' => function() {
            return factory(\App\Models\Group::class)->create()->id;
        }
    ];
});
