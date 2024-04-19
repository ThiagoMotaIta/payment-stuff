<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User 1
        User::create([
            'user_amount' => '500',
            'name' => 'Thiago Mota',
            'email' => 'thiagomotaita1@gmail.com',
            'password' => bcrypt('qwer1234'),
        ]);

        // User 2
        User::create([
            'user_amount' => '700',
            'name' => 'Goku',
            'email' => 'goku@email.com',
            'password' => bcrypt('654321'),
        ]);

    }
}
