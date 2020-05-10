<?php

use App\Cart;
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
        // $this->call(UserSeeder::class);
        factory(App\User::class, 10)->create();
        factory(App\Driver::class, 5)->create();
        factory(App\Seller::class, 5)->create();
        factory(App\Category::class, 8)->create();
        factory(App\Food::class, 50)->create();
        factory(App\Cart::class, 20)->create();
        factory(App\Review::class, 90)->create();
    }
}
