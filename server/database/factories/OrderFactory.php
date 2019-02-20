<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    $users = App\User::pluck('id')->toArray();
    $items = App\Item::pluck('id')->toArray();

    $selectedItems = $faker->randomElements($items, $faker->numberBetween(0, 10));

    return [
        'user_id' => $faker->randomElement($users),
        'date' => $faker->dateTimeBetween('-1 years'),
        'items' => collect($selectedItems)->map(function($item, $key) use($faker) {
            return [
                'item' => $item,
                'quantity' => $faker->numberBetween(1, 10),
            ];
        }),
    ];
});
