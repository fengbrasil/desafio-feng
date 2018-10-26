<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'dt_order' => \Carbon\Carbon::now(),
        'client_id' => function(){
            return factory(App\Client::class)->create()->id;
        }
    ];
});
