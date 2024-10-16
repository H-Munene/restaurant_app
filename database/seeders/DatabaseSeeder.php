<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $users = [
            [
            'name' => 'System Admin',
            'email' => 'admin@my-restaurant.com',
            'password' => Hash::make('Qwerty1.'),
            'user_type' => 'Administrator',
            'phone' => '0720333111',
            'location' => 'Nairobi'
            ],
            [
            'name' => 'John Doe',
            'email' => 'johndoe@my-restaurant.com',
            'password' => Hash::make('Qwerty1.'),
            'user_type' => 'Employee',
            'phone' => '0720333112',
            'location' => 'Nairobi',
            ],
            [
            'name' => 'Jane Doe',
            'email' => 'janedoe@my-restaurant.com',
            'password' => Hash::make('Qwerty1.'),
            'user_type' => 'Employee',
            'phone' => '0720333113',
            'location' => 'Nairobi',
            ]
            ];

        DB::table('users')->insert($users);

        $this->call([
            CategoriesSeeder::class
        ]);


    }
}
