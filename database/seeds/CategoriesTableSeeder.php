<?php

use App\category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        category::create([
            'name' => 'Brownie',
        ]);
        category::create([
            'name' => 'Galleta',
        ]);
        category::create([
            'name' => 'Paquetes',
        ]);
        category::create([
            'name' => 'Especiales',
        ]);
        category::create([
            'name' => 'Personalizados',
        ]);
    }
}
