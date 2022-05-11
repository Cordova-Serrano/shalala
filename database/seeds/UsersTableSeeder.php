<?php

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Eduardo Cordova',
            'email' => 'corse.eduardo@gmail.com',
            'password' => Hash::make('admin123'),
            'tipo' => 0,
        ]);

        User::create([
            'name' => 'Ricardo Martinez',
            'email' => 'creativo@gmail.com',
            'password' => Hash::make('password'),
            'tipo' => 1,
        ]);
        User::create([
            'name' => 'Jocelyn Llamas',
            'email' => 'mjlldlt@gmail.com',
            'password' => Hash::make('password'),
            'tipo' => 1,
        ]);
        User::create([
            'name' => 'Sebastian Zavala',
            'email' => 'sbrz@gmail.com',
            'password' => Hash::make('password'),
            'tipo' => 1,
        ]);
    }
}
