<?php

use Faker\Generator as Faker;

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->text,
        'value' => $faker->randomFloat(2, 1, 1000),
    ];
});
