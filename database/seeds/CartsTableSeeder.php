<?php

use App\Cart;
use Illuminate\Database\Seeder;

class CartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cart::create([
            'user_id' => 1,
        ]);
        Cart::create([
            'user_id' => 2,
        ]);
        Cart::create([
            'user_id' => 3,
        ]);
        Cart::create([
            'user_id' => 4,
        ]);
    }
}
