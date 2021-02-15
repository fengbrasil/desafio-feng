<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 100)->create();
        factory(App\Item::class, 100)->create();
        factory(App\Order::class, 100)->create();
    }
}
