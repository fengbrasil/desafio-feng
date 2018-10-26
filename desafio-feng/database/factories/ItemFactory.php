<?php

use Faker\Generator as Faker;

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->word,
        'vl_unitary' => '10.50'
    ];
});
