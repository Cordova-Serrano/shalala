<?php

use App\ProductsByCar;
use Illuminate\Database\Seeder;

class ProductsByCarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductsByCar::create([
            'user_id' => 2,
            'product_id' => 1,
            'quantity' => 2,
        ]);

        ProductsByCar::create([
            'user_id' => 3,
            'product_id' => 2,
            'quantity' => 2,
        ]);
    }
}
